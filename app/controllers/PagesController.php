<?php
namespace app\controllers;

use app\models\User;
use app\models\Product;
use app\models\Category;

class PagesController 
{

  public function dashboard()
  {
    $cates = Category::getAllRow();
    $products = Product::getAllRow();
    $users = User::getAllRow();
    return view('dashboard', compact("cates", "products", "users"));
  }
}