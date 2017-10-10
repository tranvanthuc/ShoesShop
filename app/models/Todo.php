<?php 
namespace app\models;

use core\App;

class Todo 
{
  static $table = "todos";
  public $description;

  // get all todos
  public static function getAll()
  {
    return App::get('database')->getAll(Todo::$table);
  }

  // insert todo and return object after insert
  public static function insert($description) 
  {
    $id = App::get('database')->insert(Todo::$table, [
      'description'=> $description,
      'completed' => 0
    ]);
    return Todo::getById($id);
  }

  // get todo by id
  public static function getById($id) 
  {
    return App::get('database')->getById(Todo::$table, $id);
  }

  // update todo by id
  public static function updateById($id, $description, $completed = 0) 
  {
    App::get('database')->updateById(Todo::$table, [
      'description'=> $description,
      'completed' => $completed
    ], $id);
    return Todo::getById($id);
  }

  // delete todo by id
  public static function deleteById($id) 
  {
    $todo = Todo::getById($id);
    App::get('database')->deleteById(Todo::$table, $id) ;
    return $todo;
  }
}