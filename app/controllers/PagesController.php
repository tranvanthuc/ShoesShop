<?php

namespace app\controllers;

class PagesController 
{
  public function home()
  {
    return view('index');
  }

  public function about()
  {
    return view('about');
  }

  public function contact()
  {
    $name = "Thuc";

    return view('contact', ['name' => $name]);
  }

}