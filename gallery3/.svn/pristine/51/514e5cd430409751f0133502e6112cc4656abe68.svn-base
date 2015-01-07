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
class item_rest_Core {
  /**
   * For items that are collections, you can specify the following additional query parameters to
   * query the collection.  You can specify them in any combination.
   *
   *   scope=direct
   *     Only return items that are immediately under this one
   *   scope=all
   *     Return items anywhere under this one
   *
   *   name=<substring>
   *     Only return items where the name contains this substring
   *
   *   random=true
   *     Return a single random item
   *
   *   type=<comma separate list of photo, movie or album>
   *     Limit the type to types in this list, eg: "type=photo,movie".
   *     Also limits the types returned in the member collections (same behaviour as item_rest).
   */
  static function get($request) {
    $item = rest::resolve($request->url);
    //$item is an object of item_Model class
    access::required("view", $item);
    $p = $request->params;
    
    /*
     * If $item->id === 1, this is the root node of items table,
     * so we write new function to return all ablum nodes(album nodes' level is 2)
     */
    $result = array();
    if($item->id == '1')
    {
      
       $result = call_user_func(array("item_rest","AlbumByModel"),$item);   
    }
    
    if (isset($p->random)) {
      $orm = item::random_query()->offset(0)->limit(1);
    } else {
      $orm = ORM::factory("item")->viewable();
    }
     
    if (empty($p->scope)) {
      $p->scope = "all";
      //We need use undirect scope to find all items satisfying our requirements
      //$p->scope = "direct";
      
    }

    if (!in_array($p->scope, array("direct", "all"))) {
      throw new Rest_Exception("Bad Request", 400);
    }
    $p->scope = "all";
    //We want to find all photos(so set level>2)
    if ($p->scope == "direct") {
      $orm->where("parent_id", "=", $item->id);
    } else {
      $orm->where("level", ">", $item->level +1);//find all photos directly
      $orm->where("right_ptr", "<", $item->right_ptr);
    }

    if (isset($p->name)) {
      $orm->where("name", "LIKE", "%" . Database::escape_for_like($p->name) . "%");
    }

    if (isset($p->type)) {
      $orm->where("type", "IN", explode(",", $p->type));
    }

    // Apply the item's sort order, using id as the tie breaker.
    // See Item_Model::children()
    $order_by = array($item->sort_column => $item->sort_order);
    if ($item->sort_column != "id") {
      $order_by["id"] = "ASC";
    }
    $orm->order_by($order_by);
    
    if(!array_key_exists("entity",$result))
    {
        $result["entity"]=$item->as_restful_array();
    }

      $result["url"] = $request->url;  
      $result["relationships"] = rest::relationships("item", $item);
   
    if ($item->is_album()) {
      $result["photos"] = array();
      
      foreach ($orm->find_all() as $child) {

        //$result["members"][] = rest::url("item", $child);
          //$childitem = rest::resolve(rest::url("item", $child));
          //$finalresult["album".(string)$stringnum] = $childitem;
          $result["photos"][] = $child ->as_restful_array();
      }
      
    }
 
    return $result;
  }


  static function put($request) {
    $item = rest::resolve($request->url);
    access::required("edit", $item);

    if ($entity = $request->params->entity) {
      // Only change fields from a whitelist.
      foreach (array("album_cover", "captured", "description",
                     "height", "mime_type", "name", "parent", "rand_key", "resize_dirty",
                     "resize_height", "resize_width", "slug", "sort_column", "sort_order",
                     "thumb_dirty", "thumb_height", "thumb_width", "title", "view_count",
                     "width") as $key) {
        switch ($key) {
        case "album_cover":
          if (property_exists($entity, "album_cover")) {
            $album_cover_item = rest::resolve($entity->album_cover);
            access::required("view", $album_cover_item);
            $item->album_cover_item_id = $album_cover_item->id;
          }
          break;

        case "parent":
          if (property_exists($entity, "parent")) {
            $parent = rest::resolve($entity->parent);
            access::required("edit", $parent);
            $item->parent_id = $parent->id;
          }
          break;
        default:
          if (property_exists($entity, $key)) {
            $item->$key = $entity->$key;
          }
        }
      }
    }

    // Replace the data file, if required
    if (($item->is_photo() || $item->is_movie()) && isset($request->file)) {
      $item->set_data_file($request->file);
    }

    $item->save();

    if (isset($request->params->members) && $item->sort_column == "weight") {
      $weight = 0;
      foreach ($request->params->members as $url) {
        $child = rest::resolve($url);
        if ($child->parent_id == $item->id && $child->weight != $weight) {
          $child->weight = $weight;
          $child->save();
        }
        $weight++;
      }
    }
	
	/* [dfw]: index the item (album or photo) to imgMatch server. */
	dresssearch::add_photo($item);
  }

  static function post($request) {
    $parent = rest::resolve($request->url);
    access::required("add", $parent);

    $entity = $request->params->entity;
    $item = ORM::factory("item");
    switch ($entity->type) {
    case "album":
      $item->type = "album";
      $item->parent_id = $parent->id;
      $item->name = $entity->name;
      $item->title = isset($entity->title) ? $entity->title : $entity->name;
      $item->description = isset($entity->description) ? $entity->description : null;
      $item->slug = isset($entity->slug) ? $entity->slug : null;
      $item->save();
      break;

    case "photo":
    case "movie":
      if (empty($request->file)) {
        throw new Rest_Exception(
          "Bad Request", 400, array("errors" => array("file" => t("Upload failed"))));
      }
    $item->type = $entity->type;
    $item->parent_id = $parent->id;
    $item->set_data_file($request->file);
    $item->name = $entity->name;
    $item->title = isset($entity->title) ? $entity->title : $entity->name;
    $item->description = isset($entity->description) ? $entity->description : null;
    $item->slug = isset($entity->slug) ? $entity->slug : null;
    $item->save();
    break;

    default:
      throw new Rest_Exception(
        "Bad Request", 400, array("errors" => array("type" => "invalid")));
    }

	/* [dfw]: index the item (album or photo) to imgMatch server. */
	dresssearch::add_photo($item);

    return array("url" => rest::url("item", $item));
  }

  static function delete($request) {
    $item = rest::resolve($request->url);
    access::required("edit", $item);

    /* [dfw]: remove this item (album or photo) from the imgMatch server. */
    dresssearch::remove_photo($item);
	
    $item->delete();
  }

  static function resolve($id) {
    $item = ORM::factory("item", $id);
    if (!access::can("view", $item)) {
      throw new Kohana_404_Exception();
    }
    return $item;
  }

  static function url($item) {
    return url::abs_site("rest/item/{$item->id}");
  }
  
  
  static function AlbumByModel($item)
  {

      $orm = ORM::factory("item")->viewable();
      //Because we use find_all function(inside has select and from), so we don't need to set "select" "from"
      $columnlist = array(
        "itemsTable_item_id" => "items.id",
        "tagsTable_tag_id" => "tags.id",
        "itemstagsTable_id" => "items_tags.id",
        "tagsTable_name" => "tags.name",
        "usersTable_name" => "users.name",
        );

      
      $orm->select(array("*"));
      $orm->select($columnlist);     
      //$orm->select("itemsTable_item_id","items.id");
      
      $orm->from("items");
       //$orm->where("parent_id", "=", $item->id);

      $orm->join("items_tags","items_tags.item_id" , "items.id");
      $orm->join("tags", "items_tags.tag_id", "tags.id");
      $orm->join("users" , "items.owner_id" , "users.id");
 
 
      $result = array(
             "entity" => $item->as_restful_array(),
             //"members" => array()
         );
         //$result["members"] = array();      
       $orm->direct_db = Database::instance($orm->direct_db);
       $executeresult = $orm->db_builder->execute($orm->direct_db);
       
        $temp = new ORM_Iterator($orm, $executeresult);
      foreach ($temp as $child)
         {   
             $result["members"][] = $child->as_restful_array();       
             /*$result["members"][] = $child;
              * If we don't need RestArray as return format, we can just use the code above
             */
         }
            /*
             Note:
             0. $orm->find_all() will return an instance of ORM_Iterator, Please refer to ORM::load_result() function,      
             1. find() or find_all() method will use ORM::load_result() method. 
             2. find_all() will return ORM_Iterator object(it implemented iterator interface, when using foreach{} to iterate
             it, it will build and return n item_Model objects, with every object->object[] store one row results. Please refer to orm_iterator::current
             and item_Model::construct($row).
             3. find()--- just one row result limit,  will return an item_Model object, one row record will store in item_Model->object[] (it is an array)
             */ 
      
       foreach ($result as $key1 => $member)
       {
          if ($key1 === "members")
          {
              foreach($member as $key2 => $album)
              {
                  $orm2 = ORM::factory("item");
                  $parentid = $album["itemsTable_item_id"];
                  $orm2->where("parent_id", "=", $parentid);
                  $result[$key1][$key2]["children"] =array();
                 foreach ($orm2->find_all() as $child) 
                 {
                   $result[$key1][$key2]["children"][]= $child ->as_restful_array();
                 }
                   //$result[$key1][$key2]["children"] = "I am the test sentence";
                   
                  
              }
          }
       }
       
       //$result["rating"] =array();   
       $newresult = call_user_func(array("item_rest","FindRating"),$result);   
       //$result["rating"] = $ratingArray;
        
     return $newresult; 
  }
  
  static function AlbumByDb($item)
  {
  	 //$orm = ORM::factory("item")->viewable();
      $orm = ORM::factory("item");
         //Directly write sql query
         //$sql = "SELECT  *  FROM  mf_items ";
 
        
         $sql = "SELECT *, mf_items.id AS itemsTable_item_id, mf_tags.id AS tagsTable_tag_id, "
                 . "mf_items_tags.id AS itemstagsTable_id, mf_tags.name AS tagsTable_name, "
                 . "mf_users.name AS usersTable_name ";
         $sql .= " FROM mf_items JOIN mf_items_tags ON mf_items.id = mf_items_tags.item_id ";
         $sql .=" JOIN mf_tags ON mf_items_tags.tag_id = mf_tags.id ";
         $sql .=" JOIN mf_users ON mf_items.owner_id = mf_users.id ";
         //$orm->db->connect();
         $mysqli = mysqli_init();
         /* 
         Database configurations are as below: 
          *       
         $type    ="mysqli";
         $user    = "root";
          $pass     = "Qwe54321";
         $host     = "localhost";
         $port     = false;
         $socket   = false;
         $database = "gallery3";
         $params   = null;    
         */
         
         $orm->direct_db = Database::instance($orm->direct_db);
         $config = Kohana::config('database.'.'default');
         if (is_string($config['connection']))
	{
				// Parse the DSN into connection array
	   $config['connection'] = Database::parse_dsn($config['connection']);
	}
         log::success("cliu","config is  ".serialize($config));
         $mysqli->real_connect($config['connection']["host"], $config['connection']["user"], $config['connection']["pass"], 
                 $config['connection']["database"], $config['connection']["port"], 
                 $config['connection']["socket"], $config['connection']["params"]);

         $orm->direct_db->direct_connection = $mysqli;
  	 $queryResult = $orm->direct_db->direct_connection->query($sql);
         $mysqliResult = new Database_Mysqli_Result($queryResult,$sql,$orm->direct_db->direct_connection,true);
         //$Iterator = new ORM_Iterator($orm, $mysqliResult);
    
         $result = array(
             "entity" => $item->as_restful_array(),
             //"members" => array()
         );
         $result["members"] = array();
         foreach ($mysqliResult as $child)
         {
             /*$result["members"][] = $child;
              * If we don't need RestArray as return format, we can just use the code above
             */
             $class  = get_class($orm);
             $row = new $class($child);
             $result["members"][] = $row->as_restful_array();
             //$result["members"]["children"] = array();
         }
         
       foreach ($result as $key1 => $member)
       {
          if ($key1 === "members")
          {
              foreach($member as $key2 => $album)
              {
                  
                   
                  $orm = ORM::factory("item")->viewable();
                  $parentid = $album["item_id"];
                  $orm->where("parent_id", "=", $parentid);
                  $result[$key1][$key2]["children"] =array();
                 foreach ($orm->find_all() as $child) 
                 {
                   $result[$key1][$key2]["children"][] = $child ->as_restful_array();
                 }
                   //$result[$key1][$key2]["children"] = "I am the test sentence";
                   
                  
              }
          }
       }
      /*   
         foreach ($result["members"] as $album)
         {
             $orm = ORM::factory("item")->viewable();
             $orm->where("parent.id", "=", $album[item_id]);
             //$album["children"] = array();
             foreach ($orm->find_all() as $child) 
            {
              $album["children"][] = $child ->as_restful_array();
            }
             log::success("cliu", "this way 1");
         }
         */
         
         return $result;
  }


  static function FindRating($result)
  {
      log::success("cliu" , "path1");
      $ratingArray = array();
      $orm3 = ORM::factory("item")->viewable();
      $columnlist = array(
        "itemsTable_item_id" => "items.id",
        "tagsTable_tag_id" => "ratings.id",
        "rating" => "ratings.rating",
        );
      $orm3->select($columnlist); 
      $orm3->from("items");
      $orm3->join("ratings","ratings.item_id" , "items.id");
      $orm3->direct_db = Database::instance($orm3->direct_db);
       $executeresult = $orm3->db_builder->execute($orm3->direct_db);   
        $temp = new ORM_Iterator($orm3, $executeresult);
      foreach($temp as $child)
      {    
          $ratingArray[] = $child->object;
      }
      foreach($ratingArray as $index=>$child)
      {
          foreach($child as $key => $value)
          {
              if($value === null)
              {
              unset($ratingArray[$index][$key]);
              }
          }
      }
      log::success("cliu" , "path2");
      foreach ($result as $key1 => $member)
      {
        if($key1==="members")
        {          
          foreach($member as $key2 => $album)
          {
                  $result[$key1][$key2]["thumbup"] = 0;
                  $result[$key1][$key2]["thumbdown"] = 0;
            
          }
        }
      }
      log::success("cliu" , "path3");
      foreach ($result as $key1 => $member)
      {
        if($key1==="members")
        {          
          foreach($member as $key2 => $album)
          {            
              log::success("cliu" , "path4");
              foreach($ratingArray as $record => $rating)
              {
                  if($rating["itemsTable_item_id"] === $album["itemsTable_item_id"])
                  {
                      if($rating["rating"] === '100' )
                      {
                          $result[$key1][$key2]["thumbup"]++;
                      }
                      else
                      {
                          $result[$key1][$key2]["thumbdown"]++;
                      }
                      unset($ratingArray[$record]);
                  }
              }
          }
        }
      }
      return $result;
  }
}