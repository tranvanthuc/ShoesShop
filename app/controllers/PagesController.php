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
    $name = "Minh Thai";

    return view('contact', ['name' => $name]);
  }

}