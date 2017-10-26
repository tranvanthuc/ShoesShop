<?php
namespace app\controllers;

use app\models\User;
use app\models\Product;
use app\models\Category;
use app\models\Feedback;

class PagesController 
{

  public function dashboard()
  {
    $cates = Category::getAllRow();
    $products = Product::getAllRow();
    $users = User::getAllRow();
    $feedbacks = Feedback::getAllRow();
    return view('dashboard', compact("cates", "products", "users", "feedbacks"));
  }
}