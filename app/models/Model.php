<?php 
namespace app\models;

use core\App;

class Model {
  // get all 
  public static function getAll($table)
  {
    return App::get('database')->getAll($table);
  }

  // insert 
  public static function insert($table, $params) 
  {
    $id = App::get('database')->insert($table, $params);
    return Model::getById($table, $id);
  }

  // get by id
  public static function getById($table,$id) 
  {
    return App::get('database')->getById($table, $id);
  }

  // update  by id
  public static function updateById($table, $id, $params) 
  {
    App::get('database')->updateById($table, $params, $id);
    return Model::getById($table, $id);
  }

  // delete by id
  public static function deleteById($table,$id) 
  {
    $temp = Model::getById($id);
    App::get('database')->deleteById($table, $id);
    return $temp;
  }

  // check data exist
  public static function checkDataExist($table,$params) 
  {
    $temp = App::get('database')->checkDataExist($table, $params);
    return $temp ? true : false;
  } 
  
  // query
  public static function query($sql) 
  {
    return App::get('database')->query($sql);
  }
}