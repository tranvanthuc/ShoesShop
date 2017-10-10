<?php 
namespace app\controllers;

use app\models\Category;

class CategoriesController
{
	public function index()
	{
		$cates = Category::selectAll();

		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		echo json_encode($cates);
	}

	public function create()
	{
		return view('category/create');
	}

	public function store()
	{
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		Category::insert($name, $gender);
		
		return redirect('cates');
	}

	public function delete()
	{
		$id = $_GET['id'];
		Category::deleteById($id);
		return redirect('cates');
	}
} 