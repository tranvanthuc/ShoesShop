<?php 
namespace app\models;

use core\App;

class Model {

  public static $table;
  // get all 
  public static function getAll()
  {
    return App::get('database')->getAll(static::$table);
  }

  // insert 
  public static function insert($params) 
  {

    $id = App::get('database')->insert(static::$table, $params);
    
    return Model::getById(static::$table, $id);
  }

  // get by id
  public static function getById($table, $id) 
  {
    return App::get('database')->getById($table, $id);
  }

  // update  by id
  public static function updateById($id, $params) 
  {
    App::get('database')->updateById(static::$table, $params, $id);
    return Model::getById(static::$table, $id);
  }

  // delete by id
  public static function deleteById($id) 
  {
    $temp = Model::getById(static::$table, $id);
    App::get('database')->deleteById(static::$table, $id);
    return $temp;
  }

  // check data exist
  public static function checkDataExist($params) 
  {
    $temp = App::get('database')->checkDataExist(static::$table, $params);
    return $temp ? true : false;
  } 
  
  // query
  public static function query($sql) 
  {
    return App::get('database')->query($sql);
  }
}