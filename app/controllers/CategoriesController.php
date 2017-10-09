<?php 
namespace app\controllers;

use app\models\Category;

class CategoriesController
{
	public function index()
	{
		$cates = Category::selectAll();
		header('Content-type: application/json');
		// return view('category/index', compact("cates"));
		$response = new Response(json_encode($cates));
    $response->headers->set('Content-Type', 'application/json');

		return $response;
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