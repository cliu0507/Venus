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

/**
 * This is the API for handling comments.
 *
 * Note: by design, this class does not do any permission checking.
 */
class comment_Core {
  static function get_add_form($item) {
    $form = new Forge("comments/create/{$item->id}", "", "post", array("id" => "g-comment-form"));
    $group = $form->group("add_comment")->label(t("Add comment"));
    $group->hidden("name")
      /*->label(t("Name"))*/
      ->id("g-author")
      ->error_messages("required", t("You must enter a name for yourself"));
    $group->hidden("email")
/*      ->label(t("Email (hidden)"))*/
      ->id("g-email")
      ->error_messages("required", t("You must enter a valid email address"))
      ->error_messages("invalid", t("You must enter a valid email address"));
    $group->hidden("url")
/*      ->label(t("Website (hidden)"))*/
      ->id("g-url")
      ->error_messages("url", t("You must enter a valid url"));
    $group->textarea("text")
      ->label(t("Comment"))
      ->id("g-text")
      ->error_messages("required", t("You must enter a comment"));
    $group->hidden("item_id")->value($item->id);
    module::event("comment_add_form", $form);
    module::event("captcha_protect_form", $form);
    $group->submit("")->value(t("Add"))->class("ui-state-default ui-corner-all");

    return $form;
  }

  static function prefill_add_form($form) {
    $active = identity::active_user();
    if (!$active->guest) {
      $group = $form->add_comment;
      $group->hidden["name"]->value($active->full_name);//->disabled("disabled");
      $group->hidden["email"]->value($active->email);//->disabled("disabled");
      $group->hidden["url"]->value($active->url);//->disabled("disabled");
    }
    return $form;
  }

  static function can_comment() {
    return !identity::active_user()->guest ||
      module::get_var("comment", "access_permissions") == "everybody";
  }
  
  static function vote($item_id, $score) {
    $userid = identity::active_user()->id;

    try {
      comment_Core::rate($item_id, $userid, $score);
      
      $votecount = comment_Core::getvotecount($item_id);

      json::reply(array("result" => "success",
        "likes" => $votecount[0],
        "dislikes" => $votecount[1]));
    } catch (Database_Exception $e) {
      json::reply(array("result" => "error",
          "text" => Database_Exception::text($e)));
    }
  }
  
  static function rate($item_id, $userid, $score) {
    if (comment_Core::voted($item_id, $userid)) {
        db::build()
          ->update("ratings")
          ->set("rating", $score)
          ->where("item_id", "=", $item_id)
          ->where("userid", "=", $userid)
          ->execute();
      } else {
        $rating = ORM::factory("rating");
        $rating->item_id = $item_id;
        $rating->userid = $userid;
        $input = Input::instance();
        $rating->ip_address = substr($input->server("REMOTE_ADDR"), 0, 40);
        $rating->rating = $score;
        $rating->save();
      }
  }
  
  static function voted($item_id, $user_id) {
    $ratings = ORM::factory("rating")
      ->where("item_id", "=", $item_id)
      ->where("userid", "=", $user_id)
      ->find_all();
    
    if ($ratings->count() > 0) {
      return true;
    } else {
      return false;
    }
  }
  
  static function getvotecount($item_id) {
    $likes = ORM::factory("rating")
      ->where("rating", ">", "50")
      ->where("item_id", "=", $item_id)
      ->find_all();

    $dislikes = ORM::factory("rating")
      ->where("rating", "<=", "50")
      ->where("item_id", "=", $item_id)
      ->find_all();
    
    return (array($likes->count(), $dislikes->count()));
  }
}

