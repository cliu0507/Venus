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
 * [dfw]: added for similar dress search feature (helper)
 * command format: add image     - "add:category_id:image_id:image_path;image_id:image_path;...;"
 *                 remove image  - "del:category_id:image_id;image_id;...;"
 *                 query by id   - "query_id:category_id:image_id:number"
 *                 query by path - "query_path:category_id:number:image_path"
 */
class dresssearch_Core {
  const IMG_MATCH_METHOD = "tcp";
  const IMG_MATCH_HOST = "localhost";
  const IMG_MATCH_PORT = 9117;
  const IMG_MATCH_SEARCHSIZE = 100;
  const IMG_MATCH_COMMAND_ADDIMG = "add";
  const IMG_MATCH_COMMAND_REMOVEIMG = "del";
  const IMG_MATCH_COMMAND_SEARCHBYID = "query_id";
  const IMG_MATCH_COMMAND_SEARCHBYFILE = "query_path";
  
  static function add_photo($item) {
    log::success('dfw debug', 'enter add_photo' . $item->id);

	/* [dfw todo]: 1. category id now is fixed to be 1. */
	$command_str = dresssearch::IMG_MATCH_COMMAND_ADDIMG . ":1:";

	if($item->is_album()) {
		foreach($item->children() as $child) {
			$command_str = $command_str . $child->id . ":" . $child->file_path() . ";";
		}
	}
	else {
		$command_str = $command_str . $item->id . ":" . $item->file_path() . ";";
	}
	
	$connect_str = dresssearch::IMG_MATCH_METHOD . "://" . dresssearch::IMG_MATCH_HOST . ":" . dresssearch::IMG_MATCH_PORT;
	$fp = stream_socket_client($connect_str, $errno, $errstr, 30);

	if (!$fp) {
		log::success('dfw debug', 'add_photo error num = ' . $errno . ' error str = ' . $errstr);
	} else {		
		fwrite($fp, $command_str);
		fclose($fp);
	}
  }
  
  static function remove_photo($item) {
    log::success('dfw debug', 'enter remove_photo' . $item->id);

	/* [dfw todo]: category id now is fixed to be 1. */
	$command_str = dresssearch::IMG_MATCH_COMMAND_REMOVEIMG . ":1:";

	if($item->is_album()) {
		foreach($item->children() as $child) {
			$command_str = $command_str . $child->id . ";";
		}
	}
	else {
		$command_str = $command_str . $item->id . ";";
	}

	$connect_str = dresssearch::IMG_MATCH_METHOD . "://" . dresssearch::IMG_MATCH_HOST . ":" . dresssearch::IMG_MATCH_PORT;
	$fp = stream_socket_client($connect_str, $errno, $errstr, 30);

	if (!$fp) {
		log::success('dfw debug', 'remove_photo error num = ' . $errno . ' error str = ' . $errstr);
	} else {
		fwrite($fp, $command_str);
		fclose($fp);
	}
  }
  
  static function searchById($selected_id) {
    //[dfw todo]: include once?
    include("xmlrpc.inc");

    $c=new xmlrpc_client(IMG_SEEK_METHOD, IMG_SEEK_HOST, IMG_SEEK_PORT);

    // search by id
    $f=new xmlrpcmsg(IMG_SEEK_COMMAND_SEARCHBYID,
            array(php_xmlrpc_encode(IMG_SEEK_DB),
                  php_xmlrpc_encode($selected_id),
                  php_xmlrpc_encode(IMG_SEEK_SEARCHSIZE))
    );
    $r=&$c->send($f);
    
    if($r->faultCode()) {
      log::success('dfw', 'error search by id = ' . $selected_id . ' fault code = ' . htmlspecialchars($r->faultCode()) .
                          ' fault reason = ' . htmlspecialchars($r->faultString()));        

      return array(1, NULL, NULL);
    }
    else {
        $id_array = array();
        $id_array[$selected_id] = $selected_id;

        $perc_array_head = array(array("id" => $selected_id, "percentage" => 100));
        $perc_array_tmp = array();

        $index = 0;

        $v=$r->value();
        // iterating over values of an array object
        for ($i = 0; $i < $v->arraysize(); $i++)
        {
            if($index == IMG_SEEK_SEARCHSIZE)
                break;

            $pair = $v->arraymem($i);
            if($pair->arraymem(0)->scalarval() != $selected_id) {
                $id_array[$pair->arraymem(0)->scalarval()] = $pair->arraymem(0)->scalarval();
                $perc_array_tmp[] = array("id" => $pair->arraymem(0)->scalarval(), "percentage" => $pair->arraymem(1)->scalarval());

                $index = $index + 1;
            }
        }

        $perc_array = array_merge($perc_array_head, $perc_array_tmp);

        return array(NULL, $id_array, $perc_array);
    }
  }
    
  static function searchByFile($search_file) {
    //[dfw todo]: include once?
    include("xmlrpc.inc");

    $c=new xmlrpc_client(IMG_SEEK_METHOD, IMG_SEEK_HOST, IMG_SEEK_PORT);

    // search by file
    $f=new xmlrpcmsg(IMG_SEEK_COMMAND_SEARCHBYFILE,
            array(php_xmlrpc_encode(IMG_SEEK_DB),
                  php_xmlrpc_encode($search_file),
                  php_xmlrpc_encode(IMG_SEEK_SEARCHSIZE - 1))
    );
    $r=&$c->send($f);
    
    if($r->faultCode()) {
      log::success('dfw', 'error search by file = ' . $search_file . ' fault code = ' . htmlspecialchars($r->faultCode()) .
                          ' fault reason = ' . htmlspecialchars($r->faultString()));        

        return array(1, NULL, NULL);
    }
    else {
        $id_array = array();
        $perc_array = array();

        $v=$r->value();
        // iterating over values of an array object
        for ($i = 0; $i < $v->arraysize(); $i++)
        {
            $pair = $v->arraymem($i);
            $id_array[$pair->arraymem(0)->scalarval()] = $pair->arraymem(0)->scalarval();
            $perc_array[] = array("id" => $pair->arraymem(0)->scalarval(), "percentage" => $pair->arraymem(1)->scalarval());
        }

        return array(NULL, $id_array, $perc_array);
    }
  }
}
