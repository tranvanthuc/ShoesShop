<?php

namespace app\controllers;
use app\models\Todo;

class TodosController 
{
  // index
  public function index()
  {
    $todos = Todo::selectAll();  
    return view('todos', compact('todos'));
  }

  // insert todo
  public function insert()
  {
    $description = $_POST['description'];
    Todo::insert($description);
   
    return redirect('todos');
  }

  // get edit todo
  public function getEditTodo() 
  {
    $id = $_GET['id'];

    $todo = Todo::getById($id)[0];

    return view('editTodo',compact('todo'));
  }

  // post edit todo 
  public function postEditTodo() 
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