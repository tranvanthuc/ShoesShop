<?php
namespace app\controllers;

use app\models\ProductDetail;

class PagesController 
{
  public function index()
  {
    return view('index');
  }

  public function getLogin()
  {
    return view('login');
  }

  public function getRegister()
  {
    return view('register');
  }
}