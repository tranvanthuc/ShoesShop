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
			$id = $_GET['id'];
			$product = Product::getById($id);
			$success = "Success";
			$failure = "Product is not exist";
			echo Functions::returnAPI($product, $success,$failure);
		} else {
			$failure = "Missing params";
			echo Functions::returnAPI([], "", $failure);
		}			
	}

	// insert product
	public function insert()
	{
		if($_POST['name']
		&& $_POST['price']
		&& $_POST['amount']
		&& $_POST['category_id']
		) {
			$name = $_POST['name'];
			$price = $_POST['price'];
			$amount = $_POST['amount'];
			$category_id = $_POST['category_id'];
			$image = isset($_POST['image']) ? $_POST['image'] : "";
			$description = isset($_POST['description']) ? $_POST['description'] : "";
			
			$params = [
			'category_id' => $category_id,
			'name' => $name,
			'price' => $price,
			'amount' => $amount,
			'image' => $image,
			'description' => $description
			];
			
			$product = Product::insert($params);
			$success = "Success";
			$failure = "Product is not exist";
			echo Functions::returnAPI($product, $success, $failure);

		} else {
			$failure = "Missing params";
			echo Functions::returnAPI([], "", $failure);
		}
	}

	// delete product
	public function delete()
	{
		if($_GET['id']) {
			$id = $_GET['id'];
			$product = Product::deleteById($id);
			$success = "Success";
			$failure = "Product is not exist";
			echo Functions::returnAPI($product, $success, $failure);
		} else {
			$failure = "Missing params";
			echo Functions::returnAPI([], "", $failure);
		}
	}

	// update product
	public function update()
	{
		if($_POST['id']
		&& $_POST['name']
		&& $_POST['price']
		&& $_POST['amount']
		&& $_POST['category_id']
		) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$amount = $_POST['amount'];
			$category_id = $_POST['category_id'];
			$image = isset($_POST['image']) ? $_POST['image'] : "";
			$description = isset($_POST['description']) ? $_POST['description'] : "";
			
			$params = [
			'category_id' => $category_id,
			'name' => $name,
			'price' => $price,
			'amount' => $amount,
			'image' => $image,
			'description' => $description
			];
			
			$product = Product::updateById($id,$params);
			$success = "Success";
			$failure = "Product is not exist";
			echo Functions::returnAPI($product, $success, $failure);
		} else {
			$failure = "Missing params";
			echo Functions::returnAPI([], "", $failure);
		}

	}
}