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
class downloadalbum_event_Core {
  /* [dfw]: add icon link in the sidebar for "add album", "challenge album", and "similar dress search" */
  static function album_menu($menu, $theme) {    
    /* [dfw todo]: we may consider add "album action" here in the future */
	/* [dfw]: logged-in user could always add album */
	/*
    $active = identity::active_user();
    if(!$active->guest) {
        $menu->append(Menu::factory("dialog")
                            ->id("add_album")
                            ->label(t("Add Album"))
                            ->url(url::site("form/add/albums/1?type=album"))
                            ->css_id("g-add-album-link"));
    }
    
    if(access::can("challengealbum", $theme->item)) {
        $menu->append(Menu::factory("dialog")
                            ->id("challenge_album")
                            ->label(t("Challenge this album"))
                            ->url(url::site("challenge/challenge_album/{$theme->item->id}"))
                            ->css_id("g-challenge-album-link"));
    }
    */
    /* [dfw todo]: hardcode top album id 1. any better way? */
	/*
    if( $theme->item->id != 1 && access::can("downloadalbum", $theme->item) && $theme->children_count > 0 ) {
      $downloadLink = url::site("downloadalbum/zip/album/{$theme->item->id}");
      $menu
        ->append(Menu::factory("link")
            ->id("downloadalbum")
            ->label(t("Download Album"))
            ->url($downloadLink)
            ->css_id("g-download-album-link"));
    }
    
    $menu->append(Menu::factory("dialog")
                        ->id("similar_dress")
                        ->label(t("Similar Dress"))
                        ->url(url::site("similardress/"))
                        ->css_id("g-similar-dress-link"));
	 */
  }

  static function tag_menu($menu, $theme) {
    $menu->append(Menu::factory("dialog")
                        ->id("add_album")
                        ->label(t("Add Album"))
                        ->url(url::site("form/add/albums/1?type=album"))
                        ->css_id("g-add-album-link"));
    
    $menu->append(Menu::factory("dialog")
                        ->id("similar_dress")
                        ->label(t("Similar Dress"))
                        ->url(url::site("form/add/albums/1?type=album"))
                        ->css_id("g-similar-dress-link")); 
  }
}
