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
		echo Functions::returnAPI($cates, $success, $failure );
	}

	//get data with id
	public function getById()
	{
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$success = "Success";
			$failure = "Category does not exist";
			$cate = Category::getById($id);
			echo Functions::returnAPI($cate, $success, $failure);
		} else {
			echo Functions::returnAPI([], "", $failure );
		}
	}

	// insert data
	public function insert()
	{
		if(isset($_POST['name']) && isset($_POST['gender'])) {
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$success = "Success";
			$failure = "Category already exists";
			$cate = Category::insert($name, $gender);
			echo Functions::returnAPI($cate, $success, $failure);			
		} else {
			echo Functions::returnAPI([], "", $failure);
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
			echo Functions::returnAPI($cate, $success, $failure);
		} else {
			echo Functions::returnAPI([], "", $failure);
		}
	}

	// update data
	public function update()
	{
		if(isset($_POST['id'])) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$success = "Success";
			$failure = "Category does not exist";
			$cate = Category::updateById($id, $name, $gender);
			echo Functions::returnAPI($cate, $success, $failure);
		} else {
			echo Functions::returnAPI([], "", $failure);
		}
	}	
} 