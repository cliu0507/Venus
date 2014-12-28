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
 * 
 * [dfw]: added for album challenge feature
 */
class Challenge_Controller extends Controller {
  public function index() {
      
  }
  
  public function challenge_album($album_id) {
    log::success('dfw', 'challenge album id = ' . $album_id);
    
    $album = ORM::factory("item", $album_id);

    print print $this->_get_challenge_form($album);
  }
  
  private function _get_challenge_form($album)  {
    $form = new Forge("challenge/create/{$album->id}", "", "post", array("id" => "g-challenge-album-form"));
    $group = $form->group("challenge_album")
      ->label(t("Please select your album to challenge album: %album_title", array("album_title" => html::purify($album->title))));
    
    $my_albums = $this->_get_my_albums();

    if(count($my_albums->size) == 0) {
        
    }
    else {
        
    }

    $group = $form->group("buttons")->label("");
    $group->submit("")->value(t("Select"));
    
    return $form;
  }
  
  private function _get_my_albums() {
    $cur_user = identity::active_user();
/*    
    $my_albums = array();
    foreach (db::build()
             ->select(array("id", "name"))
             ->from("items")
             ->where("type", "=", "album")            
             ->where("owner_id", "=", $cur_user->id)
             ->order_by("created", "DESC")
             ->execute() as $row) {
      // Don't encode the names segment
      $my_albums[] = array(rawurlencode($row->id), rawurlencode($row->name));
    }

    return $my_albums;
 */      
    return ORM::factory("item")
      ->where("type", "=", "album")
      ->where("owner_id", "=", $cur_user->id)
      ->order_by("items.created", "DESC")
      ->find_all();
  }
}
