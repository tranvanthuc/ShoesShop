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
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$id = $_GET['id'];
		$cate = Category::getById($id);
		echo json_encode($cate);
	}

	public function insert()
	{
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$cate = Category::insert($name, $gender);
		
		// return redirect('cates');
		echo json_encode($cate);
	}

	public function delete()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$id = $_GET['id'];
		$cate = Category::deleteById($id);
		// return redirect('cates');
		echo json_encode($cate);
	}

	public function update()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$gender = $_REQUEST['gender'];
		$cate = Category::updateById($id, $name, $gender);
		echo json_encode($cate);
	}

	public function create()
	{
		return view('category/create');
	}

	public function getUpdate()
	{
		/*header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');*/
		$cate = Category::getById($_GET['id'])[0];
		return view('category/update', compact('cate'));
	}
	
} 