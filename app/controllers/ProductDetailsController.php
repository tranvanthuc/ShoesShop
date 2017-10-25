<?php
namespace app\controllers;

use app\models\Category;
use app\models\Product;
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

	// get data with id of table proDetails
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['id'])) {
			$proDetail = ProductDetail::getById(ProductDetail::$table, $data['id']);
			$success = "Success";
			$failure = "Not found ProductDetail";

			Functions::returnAPI($proDetail, $success, $failure);
		} else {
			$failure = "Missing Params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get insert
	public function getInsert()
	{
		$cates = Category::getAll();
		return view('products/insert', compact('cates'));
	}

	// insert data table Product_details
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['name'])
			&& isset($data['price'])
			&& isset($data['category_id'])
		) {

			ProductDetail::insert($data);

			\redirect('admin/products');
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete data in table
	public function delete()
	{
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['id'])) {
			$id = $data['id'];

			$params = [
				'product_detail_id' => $id,
			];

			$products = Product::deleteByParams($params);

			$proDetail = ProductDetail::deleteById($id);

			\redirect('admin/products');
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get update
	public function getUpdate()
	{
		$data = $_REQUEST;
		$proDetail = ProductDetail::getById(ProductDetail::$table, $data['id'])[0];
		$products = Product::getProductByProDetailId($data['id']);
		$cates = Category::getAll();
		return view('products/update/index', \compact('products', 'proDetail', 'cates'));
	}

	// update data in table
	public function update()
	{
		$data = $_REQUEST;

		if (isset($data['id'])
			&& isset($data['name'])
			&& isset($data['price'])
			&& isset($data['category_id'])
		) {
			$id = $data['id'];
			$name = $data['name'];
			$price = $data['price'];
			$category_id = $data['category_id'];
			$checkName = [
				'name' => $name,
			];
			$checkNameExist = ProductDetail::checkDataExist($checkName);
			if (count($checkNameExist) <= 1) {
				$proDetail = ProductDetail::updateById($id, $data);
				\redirect('admin/product/update?id=' . $id);
			} else {
				$failure = "Name already exist";
				Functions::returnAPI([], "", $failure);
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
			$proDetails = ProductDetail::getByParams(['*'], $data);
			$success = "Get data success !";
			$failure = "Not found product to delete !";
			Functions::returnAPI($proDetails, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get limit product detail
	public function getLimit()
	{
		$strCondition = "order by id desc limit 4";
		$proDetails = ProductDetail::getWithStringCondition(['*'], $strCondition);
		foreach ($proDetails as $item) {
			$paramsConditions = [
				'id' => $item->category_id,
			];
			$paramsGetFields = ['gender'];
			$getGender = Category::getByParams($paramsGetFields, $paramsConditions)[0];
			$item->gender = $getGender->gender;
		}
		$success = "Get data success !";
		$failure = "Failure !";
		Functions::returnAPI($proDetails, $success, $failure);
	}

	// index
	public function index()
	{
		$proDetails = ProductDetail::getAll();
		return view('products/index', compact('proDetails'));
	}

}
