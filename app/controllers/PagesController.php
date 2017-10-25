<?php
namespace app\controllers;

use app\models\ProductDetail;

class PagesController 
{
  public function dashboard()
  {
    return view('dashboard');
  }
}