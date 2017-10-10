<?php
namespace app\controllers;

use app\models\Todo;

class TodosController 
{
  // index
  public function getAll()
  {
    $todos = Todo::getAll();  
    return view('todos/index', compact('todos'));
  }

  // insert todo
  public function insert()
  {
    $description = $_POST['description'];
    $todo = Todo::insert($description);
    die(var_dump($todo));
    return redirect('todos');
  }

  // get edit todo
  public function getById() 
  {
    $id = $_GET['id'];
    $todo = Todo::getById($id)[0];
    return view('todos/edit',compact('todo'));
  }

  // post edit todo 
  public function update() 
  {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $completed = isset($_POST['completed']) ? 1: 0;
    Todo::updateById($id, $description, $completed);
    
    return redirect('todos');
  }

  // get delete todo by id
  public function delete() 
  {
    $id = $_GET['id'];

    Todo::deleteById($id);

    return redirect('todos');
  }
}