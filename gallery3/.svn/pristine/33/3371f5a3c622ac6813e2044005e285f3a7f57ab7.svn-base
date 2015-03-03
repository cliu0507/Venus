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
	  /* [dfw todo]: find_all should sort by "modify_time" & "DESC" */
      $this->show(1, 'all');
  }
  
  public function show($page_number, $type) {
	/* [dfw todo]: should find based on $page_number (offset) and $page_size (only got 6 records at one time). also should sort by "modify_time" & "DESC" */
	if($type == 'my') {
		$challengeType = 'myChallenge';
		
		$cur_user = identity::active_user();
		
		$challenges = ORM::factory("album_challenge")
				->viewable()
				->where("items.owner_id", "=", $cur_user->id)
				->order_by("modify_timestamp", "DESC")				
				->find_all();
	}
	else {
		$challengeType = 'challengeShow';
		
		$challenges = ORM::factory("album_challenge")
				->order_by("modify_timestamp", "DESC")
				->find_all();
	}
	
    if (!is_object($challenges)) {
      throw new Kohana_404_Exception();
    }

	$top_album = ORM::factory("item", 1);
	
    $input = Input::instance();
    $page_size = 6;	/*[dfw todo]: hardcode to be 6 (two challenges on one line, totally three lines) */
    $page = $input->get("page", "1");
    $children_count = $challenges->count();
    $offset = ($page - 1) * $page_size;
    $max_pages = max(ceil($children_count / $page_size), 1);
    
    // Make sure that the page references a valid offset
    if ($page < 1) {
      url::redirect($top_album->abs_url());
    } else if ($page > $max_pages) {
      url::redirect($top_album->abs_url("page=$max_pages"));
    }
	
    $template = new Theme_View("page.html", "collection", "album");
    $template->set_global(
      array("page" => $page,
            "page_title" => "Fashion Challenge",
		    "page_category" => $challengeType,
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "item" => $top_album,
            "children" => $challenges,
            //"parents" => $album->parents()->as_array(), // view calls empty() on this
            //"breadcrumbs" => Breadcrumb::array_from_item_parents($album),
            "children_count" => $children_count * 2));
    $template->content = new View("challenge.html");

    print $template;
	item::set_display_context_callback("Albums_Controller::get_display_context");
  }
  
  public function challenge_album($album_id) {
	$album = ORM::factory("item", 1);
	
	access::required("view", $album);

    $page_size = module::get_var("gallery", "page_size", 9);
    $input = Input::instance();
    $show = $input->get("show");

    if ($show) {
      $child = ORM::factory("item", $show);
      $index = item::get_position($child);
      if ($index) {
        $page = ceil($index / $page_size);
        if ($page == 1) {
          url::redirect($album->abs_url());
        } else {
          url::redirect($album->abs_url("page=$page"));
        }
      }
    }

	$cur_user = identity::active_user();
	$where_clause = array(array("owner_id", "=", $cur_user->id),
		                  array("challengeable", "=", 1),
						  array("id", "!=", $album_id));
	
	$order_by = array("updated" => "DESC");
	$order_by["id"] = "ASC";
	
    $page = $input->get("page", "1");
	
	$children_count = $album->viewable()->children_count($where_clause);
	
    $offset = ($page - 1) * $page_size;
    $max_pages = max(ceil($children_count / $page_size), 1);

    // Make sure that the page references a valid offset
    if ($page < 1) {
      url::redirect($album->abs_url());
    } else if ($page > $max_pages) {
      url::redirect($album->abs_url("page=$max_pages"));
    }

	$children = $album->viewable()->children($page_size, $offset, $where_clause, $order_by);
	
    $template = new Theme_View("page.html", "collection", "album");
    $template->set_global(
      array("page" => $page,
            "page_title" => null,
			"page_category" => 'challenge',
		    "challengeId" => $album_id,
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "item" => $album,
            "children" => $children,
            "parents" => $album->parents()->as_array(), // view calls empty() on this
            "breadcrumbs" => Breadcrumb::array_from_item_parents($album),
            "children_count" => $children_count));
    $template->content = new View("album.html");

    print $template;
  }
  
  public function doing_challenge($left_id, $right_id) {
    $now = time();
	
	/* [dfw todo]: is the challenge model complete? should we use the model->save method?
	 * what if this challenge already exists (we should just update the modify time in this case)? */
    db::build()->insert(
      "album_challenges",
      array("left_album_id" => $left_id,
            "left_album_vote" => 0,
            "right_album_id" => $right_id,
            "right_album_vote" => 0,
            "start_timestamp" => $now,
            "active" => 1,
            "modify_timestamp" => $now))
      ->execute();
	
	$this->show(1, 'all');
  }

  public function unchallenge($challenge_id) {
    db::build()
      ->delete("album_challenges")
      ->where("id", "=", $challenge_id)
      ->execute();
	
	$this->show(1, 'all');
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
