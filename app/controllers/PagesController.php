<?php
namespace app\controllers;

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