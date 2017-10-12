<?php
namespace app\controllers;

use app\models\Product;
use utils\Functions;

class ProductsController
{
	//select all data of products
	public function getAll()
	{
		$products = Product::getAll();
		$success = "Success";
		$failure = "Failure";
		echo Functions::returnAPI($products, $success, $failure);
	}

	// select product with id
	public function getById()
	{
		if(isset($_GET['id'])) {
			$product = Product::getById($_GET['id']);
			$success = "Success";
			$failure = "Product is not exist";
			echo Functions::returnAPI($product, $success,$failure);
		} else {
			$failure = "Missing params";
			echo Functions::returnAPI([], "", $failure);
		}			
	}

	public function insert()
	{
		
	}
}