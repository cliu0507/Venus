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
class dresssearchfromdb_Core {
  /**
   * Add more terms to the query by wildcarding the stem value of the first
   * few terms in the query.
   */
  static function search_by_id($id, $album) {
    list ($ignore, $perc_array) = dresssearch::searchById($id);
    $result_count = count($perc_array);
    $index = 0;
    $in_clause = "(";
    foreach ($perc_array as $perc_id) {
      $item_id = $perc_id["id"];
      //$match_perc = $perc_id["percentage"];
      $in_clause .= $item_id;
      if ((++$index) != $result_count) {
         $in_clause .= ", ";
      }
    }
    $in_clause .= ")";
    
    $db = Database::instance();
    $query = "SELECT {items}.* from {items} where id in " . $in_clause;

    $data = $db->query($query);
    $count = $result_count;

    return array($count, new ORM_Iterator(ORM::factory("item"), $data));
  }
}
