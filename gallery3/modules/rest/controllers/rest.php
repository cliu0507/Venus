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
class Rest_Controller extends Controller {
  const ALLOW_PRIVATE_GALLERY = true;

  public function index() {
    $username = Input::instance()->post("user");
    $password = Input::instance()->post("password");
    
    //log::success("cliu", "username:" . $username);
    //log::success("cliu", "password:" . $password);
    if (empty($username) || auth::too_many_failures($username)) {
      throw new Rest_Exception("Forbidden", 403);
    }

    $user = identity::lookup_user_by_name($username);
    if (empty($user) || !identity::is_correct_password($user, $password)) {
      module::event("user_login_failed", $username);
      throw new Rest_Exception("Forbidden", 403);
    }

    auth::login($user);

    rest::reply(rest::access_key());
  }

  public function reset_api_key_confirm() {
    $form = new Forge("rest/reset_api_key", "", "post", array("id" => "g-reset-api-key"));
    $group = $form->group("confirm_reset")->label(t("Confirm resetting your REST API key"));
    $group->submit("")->value(t("Reset"));
    $v = new View("reset_api_key_confirm.html");
    $v->form = $form;
    print $v;
  }

  public function reset_api_key() {
    access::verify_csrf();
    rest::reset_access_key();
    message::success(t("Your REST API key has been reset."));
    json::reply(array("result" => "success"));
  }

  public function __call($function, $args) {
    try {
      $input = Input::instance();
      $request = new stdClass();

      switch ($method = strtolower($input->server("REQUEST_METHOD"))) {
      case "get":
        $request->params = (object) $input->get();
        //$request->params = $_GET array
        //log::success("cliu",var_export($request->params));
        break;

      default:
        $request->params = (object) $input->post();
        //$request->params = $_POST array
        if (isset($_FILES["file"])) {
          $request->file = upload::save("file");
          //upload::save("file") will return new file path, please refer to helpers/upload.php
          //in HTML, name of <input> should be "file" 
          system::delete_later($request->file);
        }
        break;
      }

      if (isset($request->params->entity)) {
        $request->params->entity = json_decode($request->params->entity);
        //log::success("cliu",  serialize($request->params->entity));
        //log::success("cliu", "Check whether path 1 ");
      }
      if (isset($request->params->members)) {
        $request->params->members = json_decode($request->params->members);
        //log::success("cliu",serialize($request->params->members));
        //log::success("cliu", "Check whether path 2 ");
      }
      //log::success("cliu", "Check whether path 3 ");
      
      $request->method = strtolower($input->server("HTTP_X_GALLERY_REQUEST_METHOD", $method));
      $request->access_key = $input->server("HTTP_X_GALLERY_REQUEST_KEY");
       //log::success("cliu", $request->method);
      if (empty($request->access_key) && !empty($request->params->access_key)) {        
        $request->access_key = $request->params->access_key;
        
      }

      $request->url = url::abs_current(true);
      //Build $request->url, important
      if ($suffix = Kohana::config('core.url_suffix')) {
        $request->url = substr($request->url, 0, strlen($request->url) - strlen($suffix));
        //log::success("cliu", "Check whether path 5 ");
      }
      //log::success("cliu", "2 url= ". $request->url);
      rest::set_active_user($request->access_key);

      $handler_class = "{$function}_rest";
      $handler_method = $request->method;
   
      if (!class_exists($handler_class) || !method_exists($handler_class, $handler_method)) {
        log::success("cliu", "Check whether path 6 ");
        throw new Rest_Exception("Bad Request !! ", 400);
        
      }
      
      $response = call_user_func(array($handler_class, $handler_method), $request);//Most important step!
      if ($handler_method == "post") {
        // post methods must return a response containing a URI.
        header("HTTP/1.1 201 Created");
        header("Location: {$response['url']}");
      }
      //log::success("cliu", "403 problem" );
      //log::success("cliu", "response is".serialize($response) );
      rest::reply($response);
    } catch (ORM_Validation_Exception $e) {
      // Note: this is totally insufficient because it doesn't take into account localization.  We
      // either need to map the result values to localized strings in the application code, or every
      // client needs its own l10n string set.
      throw new Rest_Exception("Bad Request", 400, $e->validation->errors());
    } catch (Kohana_404_Exception $e) {
      throw new Rest_Exception("Not Found", 404);
    }
  }
}