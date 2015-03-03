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
class DressSearch_Controller extends Controller {
  public function index() {
    $page_size = module::get_var("gallery", "page_size", 9);
    $q = Input::instance()->get("q");
    //$q_with_more_terms = dresssearchfromdb::add_query_terms($q);
    $show = Input::instance()->get("show");

    //$album_id = Input::instance()->get("album", item::root()->id);
    $album_id = item::root()->id;
    $album = ORM::factory("item", $album_id);
    if (!access::can("view", $album) || !$album->is_album()) {
      $album = item::root();
    }

    if ($show) {
      //$child = ORM::factory("item", $show);
      //$index = dresssearchfromdb::get_position_within_album($child, $q_with_more_terms, $album);
      $index = 1;
      if ($index) {
        $page = ceil($index / $page_size);
        url::redirect(url::abs_site("dresssearch" .
          "?q=" . urlencode($q) .
          "&album=" . urlencode($album->id) .
          ($page == 1 ? "" : "&page=$page")));
      }
    }

    $page = Input::instance()->get("page", 1);

    // Make sure that the page references a valid offset
    if ($page < 1) {
      $page = 1;
    }

    //$offset = ($page - 1) * $page_size;

    list ($count, $result, $perc_array) =
      //dresssearchfromdb::search_within_album($q_with_more_terms, $album, $page_size, $offset);
      dresssearchfromdb::search_by_id(intval($q), $album);

    $max_pages = max(ceil($count / $page_size), 1);

    $template = new Theme_View("page.html", "collection", "search");
    $root = item::root();
    $template->set_global(
      array("page" => $page,
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "page_category" => "dresssearch",
            "breadcrumbs" => array(
              Breadcrumb::instance($root->title, $root->url())->set_first(),
              Breadcrumb::instance($q, url::abs_site("dresssearch?q=" . urlencode($q)))->set_last(),
            ),
            "children_count" => $count));

    $template->content = new View("search.html");
    $template->content->album = $album;
    $template->content->items = $result;
    $template->content->q = $q;

    print $template;

    item::set_display_context_callback("DressSearch_Controller::get_display_context", $album, "id", $q);
  }
  
  public function file() {
    $temp_filename = upload::save("picture");
    //system::delete_later($temp_filename);
    
    // FIXME: any potential security leak? encode the URI?
    //url::redirect(url::abs_site("dresssearch/byfile" . "?file=" . $temp_filename));
    $location = url::abs_site("dresssearch/byfile" . "?file=" . $temp_filename);
    json::reply(array("result" => "success", "location" => $location));
  }
  
  public function url() {
    $url = Input::instance()->post("url");
    $directory = Kohana::config('upload.directory', TRUE);
    $directory = rtrim($directory, '/') . '/';
    $temp_filename = $directory . time() . "download.jpg";
    if (file_put_contents($temp_filename, fopen($url, "r"))) {
      $location = url::abs_site("dresssearch/byfile" . "?file=" . $temp_filename);
      json::reply(array("result" => "success", "location" => $location));
    } else {
      json::reply(array("result" => "failure", "message" => "failed to download the file @ " . $url));
    }
  }
  
  public function byfile() {
    $page_size = module::get_var("gallery", "page_size", 9);
    $file = Input::instance()->get("file");
    //$q_with_more_terms = dresssearchfromdb::add_query_terms($q);

    //$album_id = Input::instance()->get("album", item::root()->id);
    $album_id = item::root()->id;
    $album = ORM::factory("item", $album_id);
    if (!access::can("view", $album) || !$album->is_album()) {
      $album = item::root();
    }

    $page = Input::instance()->get("page", 1);

    // Make sure that the page references a valid offset
    if ($page < 1) {
      $page = 1;
    }

    //$offset = ($page - 1) * $page_size;

    list ($count, $result, $perc_array) =
      //dresssearchfromdb::search_within_album($q_with_more_terms, $album, $page_size, $offset);
      dresssearchfromdb::search_by_file($file, $album);

    $max_pages = max(ceil($count / $page_size), 1);

    $template = new Theme_View("page.html", "collection", "search");
    $root = item::root();
    $template->set_global(
      array("page" => $page,
            "max_pages" => $max_pages,
            "page_size" => $page_size,
            "page_category" => "dresssearch",
            "uploaded_file" => basename($file),
            "breadcrumbs" => array(
              Breadcrumb::instance($root->title, $root->url())->set_first(),
            ),
            "children_count" => $count));

    $template->content = new View("search.html");
    $template->content->album = $album;
    $template->content->items = $result;
    $template->content->perc_array = $perc_array;
    $template->content->q = "";

    print $template;

    item::set_display_context_callback("DressSearch_Controller::get_display_context", $album, "file", $file);
  }

  static function get_display_context($item, $album, $searchType, $q) {
    //$q_with_more_terms = dresssearchfromdb::add_query_terms($q);
    //$position = dresssearchfromdb::get_position_within_album($item, $q_with_more_terms, $album);
    $position = 1;

    if ($position > 1) {
      if ($searchType == "id") {
        list ($count, $result_data) =
          //dresssearchfromdb::search_within_album($q_with_more_terms, $album, 3, $position - 2);
          dresssearchfromdb::search_by_id(intval($q), $album);
      } else {
        list ($count, $result_data) = dresssearchfromdb::search_by_file($q, $album);
      }
      list ($previous_item, $ignore, $next_item) = $result_data;
    } else {
      $previous_item = null;
      if ($searchType == "id") {
        list ($count, $result_data) =
          //dresssearchfromdb::search_within_album($q_with_more_terms, $album, 3, $position - 2);
          dresssearchfromdb::search_by_id(intval($q), $album);
      } else {
        list ($count, $result_data) = dresssearchfromdb::search_by_file($q, $album);
      }
      list ($next_item) = $result_data;
    }

    $root = item::root();
    if ($searchType == "id") {
      $search_url = url::abs_site("dresssearch" .
        "?q=" . urlencode($q) .
        "&album=" . urlencode($album->id) .
        "&show={$item->id}");

      return array("position" => $position,
                   "previous_item" => $previous_item,
                   "next_item" => $next_item,
                   "sibling_count" => $count,
                   "siblings_callback" => array("DressSearch_Controller::get_siblings", array($searchType, $q, $album)),
                   "breadcrumbs" => array(
                     Breadcrumb::instance($root->title, $root->url())->set_first(),
                     Breadcrumb::instance(t("Search: %q", array("q" => $q)), $search_url),
                     Breadcrumb::instance($item->title, $item->url())->set_last()));
    } else {
      return array("position" => $position,
                   "previous_item" => $previous_item,
                   "next_item" => $next_item,
                   "sibling_count" => $count,
                   "siblings_callback" => array("DressSearch_Controller::get_siblings", array($searchType, $q, $album)),
                   "breadcrumbs" => array(
                     Breadcrumb::instance($root->title, $root->url())->set_first(),
                     Breadcrumb::instance($item->title, $item->url())->set_last()));
    }
  }

  static function get_siblings($searchType, $q, $album, $limit, $offset) {
    if (!isset($limit)) {
      $limit = 100;
    }
    if (!isset($offset)) {
      $offset = 1;
    }
    //$result = dresssearchfromdb::search_within_album(dresssearchfromdb::add_query_terms($q), $album, $limit, $offset);
    if ($searchType == "id") {
      $result = dresssearchfromdb::search_by_id(intval($q), $album);
    } else {
      $result = dresssearchfromdb::search_by_file($q, $album);
    }
    return $result[1];
  }
  
  private function downloadFile ($url, $path) {
    $newfname = $path;
    $file = fopen ($url, "rb");
    if ($file) {
      $newf = fopen ($newfname, "wb");

      if ($newf)
      while(!feof($file)) {
        fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
      }
    }

    if ($file) {
      fclose($file);
    }

    if ($newf) {
      fclose($newf);
    }
  }
}
