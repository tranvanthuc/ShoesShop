<?php 
namespace app\controllers;

use app\models\Category;

class CategoriesController
{
	public function index()
	{
		$cates = Category::selectAll();

		// header('Content-Type: application/json');
		header("Access-Control-Allow-Origin: *");
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


} 