<?php
namespace app\controllers;

use app\models\Product;
use utils\Functions;

class ProductsController
{
	public function getAll()
	{
		$products = Product::getAll();
		$success = "Success";
		$failure = "Failure";
		echo Functions::returnAPI($products, $success, $failure);
	}
}