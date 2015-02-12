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
class Albums_Controller extends Items_Controller {
  /* [dfw todo]: hardcoded tag id for tag "All" */
  protected $tag_all_id = 12;

  public function index() {
    $this->fshow("recent", "home", $this->tag_all_id);
  }

  public function show($album) {
    if (!is_object($album)) {
      // show() must be public because we route to it in url::parse_url(), so make
      // sure that we're actually receiving an object
      throw new Kohana_404_Exception();
    }

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

    $page = $input->get("page", "1");
    $children_count = $album->viewable()->children_count();
    $offset = ($page - 1) * $page_size;
    $max_pages = max(ceil($children_count / $page_size), 1);

    // Make sure that the page references a valid offset
    if ($page < 1) {
      url::redirect($album->abs_url());
    } else if ($page > $max_pages) {
      url::redirect($album->abs_url("page=$max_pages"));
    }

    $template = new Theme_View("page.html", "collection", "album");
    $template->set_global(
      array("page" => $page,
            "page_title" => null,
			"page_category" => 'child',
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "item" => $album,
            "children" => $album->viewable()->children($page_size, $offset),
            "parents" => $album->parents()->as_array(), // view calls empty() on this
            "breadcrumbs" => Breadcrumb::array_from_item_parents($album),
            "children_count" => $children_count));
    $template->content = new View("album.html");
    $album->increment_view_count();

    print $template;
    item::set_display_context_callback("Albums_Controller::get_display_context");	
  }

  /* first-level album show */
  public function fshow($show_sort, $show_type, $show_tag) {
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

	if($show_type == 'my') {
		$cur_user = identity::active_user();
		$where_clause = array(array("owner_id", "=", $cur_user->id));
	}
	else {
		$where_clause = null;
	}
	
	/* [dfw todo]: should we set the "sort_column" and "sort_order" of the $item? what to do for rating? */
	if($show_sort == 'recent') {
		$order_by = array("updated" => "DESC");
		$order_by["id"] = "ASC";
	}
	else if($show_sort == 'rating') {
		$order_by = array("view_count" => "DESC");
		$order_by["id"] = "ASC";		
	}
	else if($show_sort == 'reviewed') {
		$order_by = array("view_count" => "DESC");
		$order_by["id"] = "ASC";
	}
	else {
		$order_by = null;
	}
	
    $page = $input->get("page", "1");
	
	if($show_tag == $this->tag_all_id) {
		$children_count = $album->viewable()->children_count($where_clause);
	}
	else {
		$children = album::get_children_albums($show_sort, $show_type, $show_tag);
		$children_count = count($children);
	}
	
    $offset = ($page - 1) * $page_size;
    $max_pages = max(ceil($children_count / $page_size), 1);

    // Make sure that the page references a valid offset
    if ($page < 1) {
      url::redirect($album->abs_url());
    } else if ($page > $max_pages) {
      url::redirect($album->abs_url("page=$max_pages"));
    }

	if($show_tag == $this->tag_all_id) {
		$children = $album->viewable()->children($page_size, $offset, $where_clause, $order_by);
	}
	
    $template = new Theme_View("page.html", "collection", "album");
    $template->set_global(
      array("page" => $page,
            "page_title" => null,
			"page_category" => $show_type,
		    "page_sort" => $show_sort,
		    "page_tag" => $show_tag,
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "item" => $album,
            "children" => $children,
            "parents" => $album->parents()->as_array(), // view calls empty() on this
            "breadcrumbs" => Breadcrumb::array_from_item_parents($album),
            "children_count" => $children_count));
    $template->content = new View("album.html");
    $album->increment_view_count();

    print $template;
    item::set_display_context_callback("Albums_Controller::get_display_context");	
  }
  
  static function get_display_context($item) {
    $where = array(array("type", "!=", "album"));
    $position = item::get_position($item, $where);
    if ($position > 1) {
      list ($previous_item, $ignore, $next_item) =
        $item->parent()->viewable()->children(3, $position - 2, $where);
    } else {
      $previous_item = null;
      list ($next_item) = $item->parent()->viewable()->children(1, $position, $where);
    }

    return array("position" => $position,
                 "previous_item" => $previous_item,
                 "next_item" => $next_item,
                 "sibling_count" => $item->parent()->viewable()->children_count($where),
                 "siblings_callback" => array("Albums_Controller::get_siblings", array($item)),
                 "parents" => $item->parents()->as_array(),
                 "breadcrumbs" => Breadcrumb::array_from_item_parents($item));
  }

  static function get_siblings($item, $limit=null, $offset=null) {
    // @todo consider creating Item_Model::siblings() if we use this more broadly.
    return $item->parent()->viewable()->children($limit, $offset);
  }

  public function create($parent_id) {
    access::verify_csrf();
    $album = ORM::factory("item", $parent_id);
    access::required("view", $album);
    access::required("add", $album);
    
    $form = album::get_add_form($album);
    try {
      $valid = $form->validate();
      /* [dfw todo]: seems that kohana has a bug to validate form containing name
       * like name[] (used for multiple select). It doesn't return anything (probably
       * exception return).
       */
      if(empty($valid)) {
          $valid = TRUE;
      }

      $album = ORM::factory("item");
      $album->type = "album";
      $album->parent_id = $parent_id;
      /* [dfw]: default name and slug (url) to be "ownerid_timestamp" */
      $album->name = $album->owner_id . "_" . time();
      $album->slug = $album->name;
      $album->title = $form->add_album->title->value;
      $album->description = $form->add_album->description->value;
      $album->challengeable = $form->add_album->challengeable->value;
      $album->validate();
    } catch (ORM_Validation_Exception $e) {
      // Translate ORM validation errors into form error messages
      foreach ($e->validation->errors() as $key => $error) {
        $form->add_album->inputs[$key]->add_error($error, 1);
      }
      $valid = false;
    }

    if ($valid) {
      $album->save();
      module::event("album_add_form_completed", $album, $form);
      log::success("content", "Created an album",
                   html::anchor("albums/$album->id", "view album"));
      message::success(t("Created album %album_title",
                         array("album_title" => html::purify($album->title))));

      json::reply(array("result" => "success", "location" => $album->url()));
    } else {
      json::reply(array("result" => "error", "html" => (string)$form));
    }
  }

  public function update($album_id) {
    access::verify_csrf();
    $album = ORM::factory("item", $album_id);
    access::required("view", $album);
    access::required("edit", $album);

    $form = album::get_edit_form($album);
    try {
      $valid = $form->validate();
      /* [dfw todo]: seems that kohana has a bug to validate form containing name
       * like name[] (used for multiple select). It doesn't return anything (probably
       * exception return).
       */
      if(empty($valid)) {
          $valid = TRUE;
      }
      
      $album->title = $form->edit_item->title->value;
      $album->description = $form->edit_item->description->value;
      $album->challengeable = $form->edit_item->challengeable->value;
      /* [dfw]: remove directory name and slug since we don't allow changing them now. also remove sort_column and sort_order. */
      $album->validate();
    } catch (ORM_Validation_Exception $e) {
      // Translate ORM validation errors into form error messages
      foreach ($e->validation->errors() as $key => $error) {
        $form->edit_item->inputs[$key]->add_error($error, 1);
      }
      $valid = false;
    }

    if ($valid) {
      $album->save();
      module::event("item_edit_form_completed", $album, $form);

      log::success("content", "Updated album", "<a href=\"albums/$album->id\">view</a>");
      message::success(t("Saved album %album_title",
                         array("album_title" => html::purify($album->title))));

      if ($form->from_id->value == $album->id) {
        // Use the new url; it might have changed.
        json::reply(array("result" => "success", "location" => $album->url()));
      } else {
        // Stay on the same page
        json::reply(array("result" => "success"));
      }
    } else {
      json::reply(array("result" => "error", "html" => (string)$form));
    }
  }

  public function form_add($album_id) {
    $album = ORM::factory("item", $album_id);
    access::required("view", $album);
    access::required("add", $album);

    print album::get_add_form($album);
  }

  public function form_edit($album_id) {
    $album = ORM::factory("item", $album_id);
    access::required("view", $album);
    access::required("edit", $album);

    print album::get_edit_form($album);
  }
}
