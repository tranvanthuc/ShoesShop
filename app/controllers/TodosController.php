<?php
namespace app\controllers;

use app\models\Todo;

class TodosController 
{
  // index
  public function index()
  {
    $todos = Todo::selectAll();  
    return view('todos/index', compact('todos'));
  }

  // insert todo
  public function store()
  {
    $description = $_POST['description'];
    Todo::insert($description);
   
    return redirect('todos');
  }

  // get edit todo
  public function getUpdate() 
  {
    $id = $_GET['id'];
    $todo = Todo::getById($id)[0];
    
    return view('todos/edit',compact('todo'));
  }

  // post edit todo 
  public function postUpdate() 
  {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $completed = isset($_POST['completed']) ? 1: 0;
    Todo::updateById($id, $description, $completed);
    
    return redirect('todos');
  }

  // get delete todo by id
  public function getDeleteTodo() 
  {
    $id = $_GET['id'];
    Todo::deleteById($id);

    return redirect('todos');
  }
}