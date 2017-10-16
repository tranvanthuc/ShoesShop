<?php 
namespace app\controllers;

use app\models\Category;
use utils\Functions;

class CategoriesController
{
	//select data
	public function getAll()
	{
		$cates = Category::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($cates, $success, $failure);
	}

	//get data with id
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) { // nguoi dung gui id
			$cate = Category::getById(Category::$table, $data['id']); // tra ve mang [] neu id k0 dung
			$success = "Success";
			$failure = "Not found category";

			Functions::returnAPI($cate, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure );
		}
	}

	// insert data
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['name']) && isset($data['gender'])) {

			$params = [
			'name' => $data['name'], //Stan
			// 'gender' => $gender //men, women(k0 co TH cung 1 ten co 2 gender(men, women. both))
			];

			$checkNameExist = Category::checkDataExist($params); //kiem tra name co trong DB
			if(!$checkNameExist) {
				$success = "Insert success";

				$cate = Category::insert($data);
				Functions::returnAPI($cate, $success,"");			
			} else {
				$failure = "Category already exists";
				Functions::returnAPI([], "", $failure );
			}
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete data
	public function delete()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {
			$cate = Category::deleteById($data['id']);
			$success = "Success";
			$failure = "Category does not exist";
			Functions::returnAPI($cate, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// update data
	public function update()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id']) && isset($data['name']) && isset($data['gender'])) {
			$id = $data['id'];
			$name = $data['name'];
			$gender =  $data['gender'];

			$paramsName = [
			'name' => $name
			];
			$checkName = Category::checkDataExist($paramsName);
			if(!$checkName) {
				$params = [
					'id' => $id,
					'name' => $name
				];
				$paramsData = [
					'name' => $name,
					'gender' => $gender
				];
				$checkNameExist = Category::checkDataExist($params);
				if(!$checkNameExist) {
					$success = "Update success";
					$failure = "Category is not exist";
					$cate = Category::updateById($id, $paramsData);
					Functions::returnAPI($cate, $success, $failure);
				} else {
					$failure = "Name already exist";
					Functions::returnAPI([], "", $failure);
				}
			} else {
				$failure = "Name already exist";
				Functions::returnAPI([], "", $failure);
			}
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}	
} 