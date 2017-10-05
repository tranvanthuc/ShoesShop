<?php 
namespace app\models;

use core\App;

class Todo 
{
  static $table = "todos";
  public $description;

  // get all todos
  public static function selectAll()
  {
    return App::get('database')->selectAll(Todo::$table);
  }

  // insert todo
  public static function insert($description) {
    App::get('database')->insert(Todo::$table, [
      'description'=> $description,
      'completed' => 0
    ]);
  }

  // get todo by id
  public static function getById($id) 
  {
    return App::get('database')->getById(Todo::$table, $id);
  }

  // update todo by id
  public static function updateById($id, $description, $completed = 0) {
    App::get('database')->updateById(Todo::$table, [
      'description'=> $description,
      'completed' => $completed
    ], $id);
  }


  // delete todo by id
  public static function deleteById($id) {
    App::get('database')->deleteById(Todo::$table, $id);
  }

}