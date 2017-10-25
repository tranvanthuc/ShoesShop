<?php
namespace app\controllers;

use app\models\Product;
use app\models\ProductDetail;
use utils\Functions;

class ProductsController {
	//select all data of products
	public function getAll() {
		$products = Product::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($products, $success, $failure);
	}

	// select product with id
	public function getById() {
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['id'])) {
			$id = $data['id'];
			$product = Product::getById(Product::$table, $id);
			$success = "Success";
			$failure = "Not found product";
			Functions::returnAPI($product, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// insert product
	public function insert() {
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['product_detail_id'])
			&& isset($data['size'])
			&& isset($data['color'])
			&& isset($data['quantity'])
		) {
			$size = $data['size'];
			$product_detail_id = $data['product_detail_id'];

			$checkSize = [
				'size' => $size,
				'product_detail_id' => $product_detail_id,
			];
			$checkSizeExist = Product::checkDataExist($checkSize);
			if (!$checkSizeExist) {
				$product = Product::insert($data);
				\redirect('admin/product/update?id=' . $product_detail_id);
			} else {
				$failure = "Size already existed ! ";
				Functions::returnAPI([], "", $failure);
			}

		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// update product
	public function update() {
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['id'])
			&& isset($data['size'])
			&& isset($data['quantity'])
		) {
			$id = $data['id'];
			$size = $data['size'];
			$quantity = $data['quantity'];
			$product_detail_id = $data['product_detail_id'];

			$params = [
				'size' => $size,
				'quantity' => $quantity,
			];
			$product = Product::updateById($id, $params);
			\redirect('admin/product/update?id=' . $product_detail_id);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete product by id
	public function delete() {
		$data = Functions::getDataFromClient();
		if (!$data) {
			$data = $_REQUEST;
		}
		if (isset($data['id'])) {
			$id = $data['id'];
			$product_detail_id = $data['product_detail_id'];
			$product = Product::deleteById($id);
			\redirect('admin/product/update?id=' . $product_detail_id);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// get all products all
	public function getAllInfo() {
		$data = Functions::getDataFromClient();
		$view = false;
		if (!$data) {
			$view = true;
			$data = $_REQUEST;
		}
		if (isset($data['id'])) {
			$id = $data['id'];
			$product = ProductDetail::getById(ProductDetail::$table, $id)[0];
			$paramsGetFields = ['size'];
			$paramsConditions = [
				'product_detail_id' => $id,
			];
			$sizes = Product::getByParams($paramsGetFields, $paramsConditions);
			$product->sizes = Functions::getArraySizes($sizes);
			$product->color = $product->name;

			if ($view) {
				return view('products/index', compact('products'));
			}

			$success = "Success";
			$failure = "Not found product !";
			Functions::returnAPI($product, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

}
