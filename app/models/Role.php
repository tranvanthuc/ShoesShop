<?php 

namespace app\models;

use core\App;

class Role 
{
  static $table = "roles";
  public $name;

  // get all roles
  public static function getAll()
  {
    return App::get('database')->getAll(Role::$table);
  }

  // get role by ID
  public static function getById($id)
  {
    return App::get('database')->getById(Role::$table, $id);
  }
}