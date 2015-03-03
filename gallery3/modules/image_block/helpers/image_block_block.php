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
class image_block_block_Core {
  /* [dfw]: change title from "Random image" to "Recommended Album" */
  static function get_site_list() {
    return array("random_image" => t("Recommended Album"));
  }

  static function get($block_id, $theme) {
    $block = "";
    switch ($block_id) {
    case "random_image":
      // The random_query approach is flawed and doesn't always return a
      // result when there actually is one. Retry a *few* times.
      // @todo Consider another fallback if further optimizations are necessary.
      $items = array();
		
	  if ($theme->page_category == 'challenge') {
		  $image_count = 1;
		  $items[] = ORM::factory("item", $theme->challengeId);
		  $title1 = "Album to Challenge";
		  $title2 = "Album to Challenge";
	  } else if ($theme->page_category == "dresssearch") {
        $image_count = 1;
        $items[] = ORM::factory("item", 1);
        $title1 = "Picture for Matching";
		$title2 = "Picture for Matching";
      } else {
		$image_count = module::get_var("image_block", "image_count");
		for ($i = 0; $i < $image_count; $i++) {
			$attempts = 0;
			$item = null;
			do {
				$item = item::random_query()->where("type", "=", "album")->find_all(1)->current();
			} while (!$item && $attempts++ < 3);
			if ($item) {
				$items[] = $item;
			}
		}
		$title1 = "Recommended Album";
		$title2 = "Recommended Albums";
	  }
      if ($items) {
        $block = new Block();
        $block->css_id = "g-image-block";
        $block->title = t2($title1, $title2, $image_count);
        $block->content = new View("image_block_block.html");
        $block->content->items = $items;
      }
      break;
    }

    return $block;
  }
}
