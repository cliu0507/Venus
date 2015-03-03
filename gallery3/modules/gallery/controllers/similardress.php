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
 * [dfw]: added for similar dress search feature (controller)
 */
class Similardress_Controller extends Controller {
  public function index() {
    print $this->get_similar_dress_search_by_file_form();
  }
  
  public function byfile() {
    print $this->get_similar_dress_search_by_file_form();
  }
  
  public function byurl() {
    print $this->get_similar_dress_search_by_url_form();
  }
  
  public function get_similar_dress_search_by_file_form() {
    $form = new Forge("dresssearch/file", "", "post", array("id" => "g-search-similar-dress-by-file"));
    $group = $form->group("add_album")->label(t("Search similar dress by file"));

    $group->upload("picture", "C:/Users/Public/Pictures/Sample Pictures/Chrysanthemum.jpg");

    $group->submit("")->value(t("Search by File"));

    return $form;
  }
  
  public function get_similar_dress_search_by_url_form() {
    $form = new Forge("dresssearch/url", "", "post", array("id" => "g-search-similar-dress-by-url"));
    $group = $form->group("add_album")->label(t("Search similar dress by url"));

    $group->input("url", "https://www.google.com/images/srpr/logo11w.png");

    $group->submit("")->value(t("Search by Url"));

    return $form;
  }
}
