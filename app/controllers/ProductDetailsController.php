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
			
			$proDetail = ProductDetail::insert($data);
			$success = "Success";
			$failure = "Failure";
			Functions::returnAPI($proDetail, $success, $failure);
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
		$data = Functions::getDataFromClient();
		if(isset($data['id'])
			&& isset($data['name'])
			&& isset($data['price'])
			&& isset($data['category_id'])
		) {
			$id = $data['id'];
			$name = $data['name'];
			$price = $data['price'];
			$category_id = $data['category_id'];
			$checkName = [
			'name' => $name
			];
			$checkNameExist = ProductDetail::checkDataExist($checkName);
			if(!$checkNameExist) {
				$proDetail = ProductDetail::updateById($id, $data);
				$success = "Success";
				$failure = "Failure";
				Functions::returnAPI($proDetail, $success, $failure);
			} else {
				$paramsID = [
				'name' => $name,
				'id' => $id
				];
				$checkNameExist = ProductDetail::checkDataExist($paramsID);
				if($checkNameExist) {
					$proDetail = ProductDetail::updateById($id, $data);
					$success = "Success";
					$failure = "Failure";
					Functions::returnAPI($proDetail, $success, $failure);
				} else {
					$failure = "Name already exist";
					Functions::returnAPI([], "", $failure);
				}
			}
			
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get product details by category id 
	public function getByCategoryId()
	{
		$data = Functions::getDataFromClient();

		if (isset($data['category_id'])) {
			$product_details = ProductDetail::getByParams($data);
			$success = "Get data success !";
			$failure = "Not found product to delete !";
			Functions::returnAPI($product_details, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get limit product detail
	public function getLimit()
	{
		$sql = "select * from dbshoesshop.product_details order by id desc limit 4";
		$product_details = ProductDetail::query($sql);
		$success = "Get data success !";
		$failure = "Failure !";
		Functions::returnAPI($product_details, $success, $failure);
	}
}

