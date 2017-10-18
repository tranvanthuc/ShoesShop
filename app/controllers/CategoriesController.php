<?php 
namespace app\controllers;

use app\models\Category;
use app\models\ProductDetail;
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
		if (isset($data['id'])) { // nguoi dung gui id
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
		if (isset($data['name']) && isset($data['gender'])) {

			$params = [
			'name' => $data['name'], //Stan
			// 'gender' => $gender //men, women(k0 co TH cung 1 ten co 2 gender(men, women. both))
			];

			$checkNameExist = Category::checkDataExist($params); //kiem tra name co trong DB
			if (!$checkNameExist) {
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
		if (isset($data['id'])) {
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
		if (isset($data['id']) 
			&& isset($data['name']) 
			&& isset($data['gender'])
		) {
			$id = $data['id'];
			$name = $data['name'];
			$gender =  $data['gender'];

			$paramsName = [
			'name' => $name
			];
			$checkName = Category::checkDataExist($paramsName);
			if (!$checkName) { // name's not exist
				$success = "Update success";
				$cate = Category::updateById($id, $data);
				Functions::returnAPI($cate, $success, "");
			} else {
				$params = [
					'id' => $id,
					'name' => $name
				];
				
				$checkNameExist = Category::checkDataExist($params);
				if ($checkNameExist) {
					$success = "Update success";
					$failure = "Category is not exist";
					$cate = Category::updateById($id, $data);
					Functions::returnAPI($cate, $success, $failure);
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

	// get categories by catalog
	public function getCategoriesByCatalog() 
	{
		$table = Category::$table;
		$sqlMale = "select * from {$table} where gender='male'";
		$catesByMale = Category::query($sqlMale);

		$sqlFemale = "select * from {$table} where gender='female'";
		$catesByFemale = Category::query($sqlFemale);

		$data = [
			"male" => $catesByMale,
			"female" => $catesByFemale
		];
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($data, $success, $failure);
	}

	// get all cates by gender 
	public function getByGender()
	{
		$data = Functions::getDataFromClient();
		if ($data['gender']) {
			$gender =  $data['gender'];
			$table = Category::$table;
			$paramsGenderCondition = [
				'gender' => $gender
			];

			$catesByGender = Category::getByParams(['*'], $paramsGenderCondition);
			foreach($catesByGender as $key => $cate) {
				$paramsGetFields = ['id', 'name', 'price', 'image'];
				$paramsConditions = [
					'category_id' => $cate->id
				];
			
				$product_details = ProductDetail::getByParams($paramsGetFields, $paramsConditions);
				$catesByGender[$key]->products = $product_details;
			}
			$success = "Success";
			$failure = "Failure";
			Functions::returnAPI($catesByGender, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}
} 