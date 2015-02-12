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
      $this->show(ORM::factory("album_challenge")->find_all());
  }
  
  public function show($challenges) {
    if (!is_object($challenges)) {
      throw new Kohana_404_Exception();
    }
    
    $input = Input::instance();
    
    $page_size = module::get_var("gallery", "page_size", 9);

    $page = $input->get("page", "1");
    $children_count = $challenges->count();
    $offset = ($page - 1) * $page_size;
    $max_pages = max(ceil($children_count / $page_size), 1);
    
    $template = new Theme_View("page.html", "collection", "album");
    $template->set_global(
      array("page" => $page,
            "page_title" => "Fashion Challenge",
		    "page_category" => 'Home',
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "item" => NULL,
            "children" => $challenges,
            //"parents" => $album->parents()->as_array(), // view calls empty() on this
            //"breadcrumbs" => Breadcrumb::array_from_item_parents($album),
            "children_count" => $children_count * 2));
    $template->content = new View("challenge.html");

    print $template;
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
  
  public function installchallenge() {
    try {
      $db = Database::instance();
      $db->query("CREATE TABLE IF NOT EXISTS {album_challenges} (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `left_album_id` int(11) DEFAULT NULL,
        `left_album_vote` int(11) DEFAULT NULL,
        `right_album_id` int(11) DEFAULT NULL,
        `right_album_vote` int(11) DEFAULT NULL,
        `start_timestamp` int(11) DEFAULT NULL,
        `active` int(1) DEFAULT NULL,
        `modify_timestamp` int(11) DEFAULT NULL,
        `category` int(11) DEFAULT '1',
        PRIMARY KEY (`id`)
      ) DEFAULT CHARSET=utf8");
      
      $db->query("ALTER TABLE {items} ADD COLUMN challengeable BOOL DEFAULT false;");
      
      json::reply(array("result" => "success",
        "text" => "Install chanllenge database successfully."));
    } catch (Database_Exception $e) {
      json::reply(array("result" => "error",
        "text" => "Failed to install challenge database: ") . Database_Exception::text($e));
    }
  }
}
