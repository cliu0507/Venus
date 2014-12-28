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
class tag_event_Core {
  /**
   * Handle the creation of a new photo.
   * @todo Get tags from the XMP and/or IPTC data in the image
   *
   * @param Item_Model $photo
   */
  static function item_created($photo) {
    $tags = array();
    if ($photo->is_photo()) {
      $path = $photo->file_path();
      $size = getimagesize($photo->file_path(), $info);
      if (is_array($info) && !empty($info["APP13"])) {
        $iptc = iptcparse($info["APP13"]);
        if (!empty($iptc["2#025"])) {
          foreach($iptc["2#025"] as $tag) {
            $tag = str_replace("\0",  "", $tag);
            foreach (explode(",", $tag) as $word) {
              $word = trim($word);
              $word = encoding::convert_to_utf8($word);
              $tags[$word] = 1;
            }
          }
        }
      }
    }

    // @todo figure out how to read the keywords from xmp
    foreach(array_keys($tags) as $tag) {
      try {
        tag::add($photo, $tag);
      } catch (Exception $e) {
        Kohana_Log::add("error", "Error adding tag: $tag\n" .
                    $e->getMessage() . "\n" . $e->getTraceAsString());
      }
    }

    return;
  }

  static function item_deleted($item) {
    tag::clear_all($item);
    if (!batch::in_progress()) {
      tag::compact();
    }
  }

  static function batch_complete() {
    tag::compact();
  }

  /* [dfw]: category (tag) for creating album */
  static function album_add_form($item, $form) {
    $tags = tag::all_tags()->as_array();
    $tag_names = array();
    foreach ($tags as $tag) {
      $tag_names[$tag->id] = $tag->name;
    }

    $form->add_album->dropdown("add_category[]")->label(t("Album Category"))
      ->options($tag_names)
      ->multiple('multiple')
      ->selected($tags[0]->id);
  }
  
  static function album_add_form_completed($item, $form) {
    tag::clear_all($item);
    
    foreach ($_POST['add_category'] as $tag_id) {
      if ($tag_id) {
        tag::add_by_id($item, trim($tag_id));
      }
    }
  }
  
  static function item_edit_form($item, $form) {
    /* [dfw]: change tag input to category dropdown */
    $tags = tag::all_tags()->as_array();
    $tag_names = array();
    foreach ($tags as $tag) {
      $tag_names[$tag->id] = $tag->name;
    }

    $selected_ids = array();
    foreach (tag::item_tags($item) as $selected_tag) {
      $selected_ids[] = $selected_tag->id;
    }    
    $form->edit_item->dropdown("add_category[]")->label(t("Album Category"))
      ->options($tag_names)
      ->multiple('multiple')
      ->selected($selected_ids);
  }

  static function item_edit_form_completed($item, $form) {
    /* [dfw todo]: kohana has a bug to retrieve the value of name[] (multiple selection value).
     * So have to directly call php $_POST to retrieve the value.
     */
    tag::clear_all($item);
    
    foreach ($_POST['add_category'] as $tag_id) {
      if ($tag_id) {
        tag::add_by_id($item, trim($tag_id));
      }
    }
    module::event("item_related_update", $item);
  }

  static function admin_menu($menu, $theme) {
    $menu->get("content_menu")
      ->append(Menu::factory("link")
               ->id("tags")
               ->label(t("Tags"))
               ->url(url::site("admin/tags")));
  }

  /* [dfw]: supplement "Fashion Show" menu */
  static function show_menu($menu, $theme) {
      $tags = tag::all_tags()->as_array();

      foreach($tags as $tag) {
        /* [dfw log]: log tag name */
        //log::success("dfw", $tag->name);
          
        $menu->append(Menu::factory("link")
                   ->id($tag->name)
                   ->label($tag->name)
                   ->url(url::site(t("tag/%id/%name", array("id" => $tag->id, "name" => $tag->name)))));          
      }
  }
  
  static function item_index_data($item, $data) {
    foreach (tag::item_tags($item) as $tag) {
      $data[] = $tag->name;
    }
  }

  static function add_photos_form($album, $form) {
    $group = $form->add_photos;
    if (!is_object($group->uploadify)) {
      return;
    }

    $group->input("tags")
      ->label(t("Add tags to all uploaded files"))
      ->value("");
    $group->uploadify->script_data("tags", "");

    $autocomplete_url = url::site("tags/autocomplete");
    $group->script("")
      ->text("$('input[name=tags]')
                .gallery_autocomplete(
                  '$autocomplete_url',
                  {max: 30, multiple: true, multipleSeparator: ',', cacheLength: 1}
                );
              $('input[name=tags]')
                .change(function (event) {
                  $('#g-uploadify').uploadifySettings('scriptData', {'tags': $(this).val()});
                });");
  }

  static function add_photos_form_completed($album, $form) {
    $group = $form->add_photos;
    if (!is_object($group->uploadify)) {
      return;
    }

    foreach (explode(",", $form->add_photos->tags->value) as $tag_name) {
      $tag_name = trim($tag_name);
      if ($tag_name) {
        $tag = tag::add($album, $tag_name);
      }
    }
  }

  static function info_block_get_metadata($block, $item) {
    $tags = array();
    foreach (tag::item_tags($item) as $tag) {
      $tags[] = "<a href=\"{$tag->url()}\">" .
        html::clean($tag->name) . "</a>";
    }
    if ($tags) {
      $info = $block->content->metadata;
      $info["tags"] = array(
        "label" => t("Tags:"),
        "value" => implode(", ", $tags)
      );
      $block->content->metadata = $info;
    }
  }
}
