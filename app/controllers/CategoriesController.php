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

	public function getUpdate()
	{
		$cate = Category::getById($_GET['id'])[0];
		return view('category/update', compact('cate'));
	}

	public function postUpdate()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		Category::updateById($id, $name, $gender);		
	}

	
} 