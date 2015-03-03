<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2013 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class Album_Challenge_Model_Core extends ORM {
  function left_album() {
    return ORM::factory("item", $this->left_album_id);
  }
  
  function right_album() {
    return ORM::factory("item", $this->right_album_id);
  }

  /**
   * Add some custom per-instance rules.
   */
  public function validate(Validation $array=null) {
    // validate() is recursive, only modify the rules on the outermost call.
    if (!$array) {
      $this->rules = array(
        "left_album_id"     => array("callbacks" => array(array($this, "valid_left_album"))),
        "right_album_id"     => array("callbacks" => array(array($this, "valid_right_album"))),
        "album_challenge"      => array("rules"     => array("required")),
      );
    }

    parent::validate($array);
  }

  /**
   * @see ORM::save()
   */
  public function save() {
    if (!$this->loaded()) {
      // New album_challenge
      $this->start_timestamp = time();
      $visible_change = true;
      parent::save();
      module::event("album_challenge_created", $this);
    } else {
      // Updated album_challenge
      $this->modify_timestamp = time();
      $original = ORM::factory("album_challenges", $this->id);
      $visible_change = true;
      parent::save();
      module::event("album_challenge_updated", $original, $this);
    }

    // We only notify on the related items if we're making a visible change.
    if ($visible_change) {
      $left_album = $this->left_album();
      $right_album = $this->right_album();
      module::event("rating_related_update", $left_album);
      module::event("rating_related_update", $right_album);
    }

    return $this;
  }

  /**
   * Add a set of restrictions to any following queries to restrict access only to items
   * viewable by the active user.
   * @chainable
   */
  public function viewable() {
	/* [dfw todo]: for this kind of join (join with the same table twice), we have to give the
	 * table alias. But kohana parses it wrong. One way to solve this is to store owner id
	 * in the album_challenges table.
	 */
    //$this->join("items", "items.id", "album_challenges.left_album_id");
    $this->join("items", "items.id", "album_challenges.right_album_id");
	return item::viewable($this);
  }

  /**
   * Make sure we have an appropriate author id set, or a guest name.
   */
  public function valid_author(Validation $v, $field) {
    if (empty($this->userid)) {
      $v->add_error("userid", "required");
    } else if ($this->userid == identity::guest()->id && empty($this->guest_name)) {
      $v->add_error("guest_name", "required");
    }
  }

  /**
   * Make sure we have a valid associated left album id.
   */
  public function valid_left_album(Validation $v, $field) {
    if (db::build()
        ->from("items")
        ->where("id", "=", $this->left_album_id)
        ->count_records() != 1) {
      $v->add_error("left_album_id", "invalid");
    }
  }

  /**
   * Make sure we have a valid associated left album id.
   */
  public function valid_right_album(Validation $v, $field) {
    if (db::build()
        ->from("items")
        ->where("id", "=", $this->right_album_id)
        ->count_records() != 1) {
      $v->add_error("right_album_id", "invalid");
    }
  }
  
  /**
   * Same as ORM::as_array() but convert id fields into their RESTful form.
   */
  public function as_restful_array() {
    $data = array();
    foreach ($this->as_array() as $key => $value) {
      if (strncmp($key, "server_", 7)) {
        $data[$key] = $value;
      }
    }
    $data["item"] = rest::url("item", $this->left_album());
    unset($data["item_id"]);

    return $data;
  }
}
