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
		if(isset($_GET['id'])) { // nguoi dung gui id
			$id = $_GET['id'];
			$cate = Category::getById($id); // tra ve mang [] neu id k0 dung
			$success = "Success";
			$failure = "Category does not exist";

			Functions::returnAPI($cate, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure );
		}
	}

	// insert data
	public function insert()
	{
		if(isset($_POST['name']) && isset($_POST['gender'])) {
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			
			$params = [
			'name' => $name, //Stan
			// 'gender' => $gender //men, women(k0 co TH cung 1 ten co 2 gender(men, women. both))
			];
			$checkCateExist = Category::checkDataExist($params); //kiem tra name co trong DB
			if(!$checkCateExist) {
				$success = "Insert success";

				$cate = Category::insert($name, $gender);
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
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$cate = Category::deleteById($id);
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
		if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gender'])) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$params = [
			'id' => $id,
			'name' => $name
			];
			$checkNameExist = Category::checkDataExist($params);
			if(!$checkNameExist) {
				$success = "Update success";
				$failure = "Category is not exist";
				$cate = Category::updateById($id, $name, $gender);
				Functions::returnAPI($cate, $success, $failure);
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