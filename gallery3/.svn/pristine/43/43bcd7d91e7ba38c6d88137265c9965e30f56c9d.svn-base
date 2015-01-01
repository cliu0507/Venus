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
  const IMG_MATCH_BUFFER = 1024;
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
    log::success('dfw debug', 'enter searchById' . $selected_id);
	
	$perc_array = NULL;

	/* [dfw todo]: 1. category id now is fixed to be 1. */
	$command_str = dresssearch::IMG_MATCH_COMMAND_SEARCHBYID . ":1:" . $selected_id . ":" . dresssearch::IMG_MATCH_SEARCHSIZE;
	
	$connect_str = dresssearch::IMG_MATCH_METHOD . "://" . dresssearch::IMG_MATCH_HOST . ":" . dresssearch::IMG_MATCH_PORT;
	$fp = stream_socket_client($connect_str, $errno, $errstr, 30);

	if (!$fp) {
		log::success('dfw debug', 'searchById error num = ' . $errno . ' error str = ' . $errstr);
	} else {
		log::success('dfw debug', 'searchById: command = ' . $command_str);
		
		fwrite($fp, $command_str);

		/* [dfw todo]: only read the first 1024 */
		while(($buffer = fgets($fp, dresssearch::IMG_MATCH_BUFFER)) !== FALSE) {
			$perc_array = array();
			
			$offset = 0;
			
			while(($last_pos = strrpos($buffer, ";", $offset)) !== FALSE) {
				if(($first_pos = strrpos($buffer, ";", $last_pos - strlen($buffer) - 1)) === FALSE) {
					$content = substr($buffer, $first_pos, $last_pos - $first_pos);
					
					$first_pos = 0;
				}
				else {
					$content = substr($buffer, $first_pos + 1, $last_pos - $first_pos - 1);
				}
				
				if(($middle_pos = strpos($content, ":")) === FALSE)
					continue;
				else {
					$id = substr($content, 0, $middle_pos);
					$perc = substr($content, $middle_pos + 1);
					
					$perc_array[] = array("id" => $id, "percentage" => $perc);
				}
				
				if($first_pos == 0)
					break;
				else {
					$offset = $first_pos - strlen($buffer) + 1;
				}
			}
			
			break;
		}

		fclose($fp);
	}
	
	return array(NULL, $perc_array);
  }
    
  static function searchByFile($search_file) {
    log::success('dfw debug', 'enter searchByFile' . $search_file);
	
	$perc_array = NULL;

	/* [dfw todo]: 1. category id now is fixed to be 1. */
	$command_str = dresssearch::IMG_MATCH_COMMAND_SEARCHBYFILE . ":1:" . dresssearch::IMG_MATCH_SEARCHSIZE . ":" . $search_file;
	
	$connect_str = dresssearch::IMG_MATCH_METHOD . "://" . dresssearch::IMG_MATCH_HOST . ":" . dresssearch::IMG_MATCH_PORT;
	$fp = stream_socket_client($connect_str, $errno, $errstr, 30);

	if (!$fp) {
		log::success('dfw debug', 'searchByFile error num = ' . $errno . ' error str = ' . $errstr);
	} else {
		log::success('dfw debug', 'searchByFile: command = ' . $command_str);
		
		fwrite($fp, $command_str);

		/* [dfw todo]: only read the first 1024 */
		while(($buffer = fgets($fp, dresssearch::IMG_MATCH_BUFFER)) !== FALSE) {
			$perc_array = array();
			
			$offset = 0;
			
			while(($last_pos = strrpos($buffer, ";", $offset)) !== FALSE) {
				if(($first_pos = strrpos($buffer, ";", $last_pos - strlen($buffer) - 1)) === FALSE) {
					$content = substr($buffer, $first_pos, $last_pos - $first_pos);
					
					$first_pos = 0;
				}
				else {
					$content = substr($buffer, $first_pos + 1, $last_pos - $first_pos - 1);
				}
				
				if(($middle_pos = strpos($content, ":")) === FALSE)
					continue;
				else {
					$id = substr($content, 0, $middle_pos);
					$perc = substr($content, $middle_pos + 1);
					
					$perc_array[] = array("id" => $id, "percentage" => $perc);
				}
				
				if($first_pos == 0)
					break;
				else {
					$offset = $first_pos - strlen($buffer) + 1;
				}
			}
			
			break;
		}

		fclose($fp);
	}
	
	return array(NULL, $perc_array);
  }
}
