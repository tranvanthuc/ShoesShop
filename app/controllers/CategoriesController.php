<?php 
namespace app\controllers;

use app\models\Category;

class CategoriesController
{
	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$cates = Category::getAll();

		echo json_encode($cates);
	}

	public function getById()
	{
		$id = $_GET['id'];
		$cate = Category::getById($id);
		echo json_encode($cate);
	}

	public function insert()
	{
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		Category::insert($name, $gender);
		
		// return redirect('cates');
		return Category::getById();
	}

	public function delete()
	{
		$id = $_GET['id'];
		Category::deleteById($id);
		return redirect('cates');
	}

	public function update()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		Category::updateById($id, $name, $gender);		
	}

	public function create()
	{
		return view('category/create');
	}

	/*public function getUpdate()
	{
		$cate = Category::getById($_GET['id'])[0];
		return view('category/update', compact('cate'));
	}*/
	
} 