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
class tag_block_Core {
  static function get_site_list() {
    /* [dfw]: change "Popular tags" to "Album category" */
    return array("tag" => t("Album category"));
  }

  static function get($block_id, $theme) {
    $block = "";
    switch ($block_id) {
    case "tag":
      if(($theme->page_subtype == 'album') && ($theme->page_category != 'challenge')) {
          $block = new Block();
          $block->css_id = "g-tag";
          $block->title = t("Album category");
          $block->content = new View("tag_block.html");
          /* [dfw]: 1. only get item-associated tags (categories). 2. remove "add tag" input. */
          $block->content->cloud = tag::cloud(module::get_var("tag", "tag_cloud_size", 30), $theme->item());
          $block->content->form = "";
      }
      break;
    }
    return $block;
  }
}