<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
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
class Admin_Text_truncate_Controller extends Admin_Controller {
  public function index() {
    print $this->_get_view();
  }

  public function handler() {
    access::verify_csrf();

    $form = $this->_get_form();
    if ($form->validate()) {
      module::set_var(
        "text_truncate", "album", $form->text_truncate->album->value);
      module::set_var(
        "text_truncate", "sidebar", $form->text_truncate->sidebar->value);
      module::set_var(
        "text_truncate", "photo", $form->text_truncate->photo->value);
      module::set_var(
        "text_truncate", "comment", $form->text_truncate->comment->value);
		
      message::success(t("Your settings have been saved."));
      url::redirect("admin/text_truncate");
    }

    print $this->_get_view($form);
  }

  private function _get_view($form=null) {
    $v = new Admin_View("admin.html");
    $v->content = new View("admin_text_truncate.html");
    $v->content->form = empty($form) ? $this->_get_form() : $form;
    return $v;
  }

  private function _get_form() {
    $form = new Forge("admin/text_truncate/handler", "A more link will be shown after truncated text.", "post", array("id" => "g-admin-form"));
    $group = $form->group("text_truncate")
					->label(t(''));
    
    $group->input("album")->label(t('Truncate album description.'))
						  ->value(module::get_var("text_truncate", "album", "400"))
						  ->rules("required|valid_numeric|length[1,3]");
	$group->input("sidebar")->label(t('Trancate description in the sidebar.'))
							->value(module::get_var("text_truncate", "sidebar", "400"))
							->rules("required|valid_numeric|length[1,3]");
	$group->input("photo")->label(t('Truncate photo description.'))
							->value(module::get_var("text_truncate", "photo", "400"))
							->rules("required|valid_numeric|length[1,3]");
	$group->input("comment")->label(t('Truncate comment text.'))
							->value(module::get_var("text_truncate", "comment", "400"))
							->rules("required|valid_numeric|length[1,3]");
    $group->submit("submit")->value(t("Save"));

    return $form;
  }
}