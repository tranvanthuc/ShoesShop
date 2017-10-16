<?php 
namespace app\controllers;

use app\models\ProductDetail;
use utils\Functions;

class ProductDetailsController
{
	// get data in table ProductDetail
	public function getAll()
	{
		$proDetails = ProductDetail::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($proDetails, $success, $failure);
	}

	// get data with id of table Product_details
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {	
			$proDetail = ProductDetail::getById(ProductDetail::$table, $data['id']);
			$success = "Success";
			$failure = "Not found ProductDetail";

			Functions::returnAPI($proDetail, $success, $failure);
		} else {
			$failure = "Missing Params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// insert data table Product_details
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['name'])
			&& isset($data['price'])
			&& isset($data['category_id'])
		) {
			$name = $data['name'];
			$price = $data['price'];
			$category_id = $data['category_id'];
			$checkName = [
			'name' => $name
			];
			$checkNameExist = ProductDetail::checkDataExist($checkName);
			if(!$checkNameExist) {
				$params = [
					'category_id' => $category_id,
					'name' => $name,
					'price' => $price,
					'image' => $data['image'],
					'description' => $data['description']
				];
				$proDetail = ProductDetail::insert($params);
				$success = "Success";
				$failure = "Failure";

				Functions::returnAPI($proDetail, $success, $failure);
			} else {
				$failure = "Product name is exists";
				Functions::returnAPI([], "", $failure);
			}
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete data in table
	public function delete()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['id'])) {
			$id = $data['id'];
			$proDetail = ProductDetail::deleteById($id);
			$success = "Success";
			$failure = "Not found product to delete !";
			Functions::returnAPI($proDetail, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// update data in table
	public function update()
	{
		
	}
}

