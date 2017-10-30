<?php
namespace app\controllers;

class AjaxController 
{
  public function index()
  {
    return view('ajax/index');
  }

  public function update()
  {
    return view('ajax/update');
  }
}