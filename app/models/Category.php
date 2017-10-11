<?php 
namespace app\models;

use core\App;

class Category
{
	static $table = "categories";
	public $name;
	public $gender;

	// get all data interactive DB
	public static function getAll()
	{
		return App::get('database')->getAll(Category::$table);
	}

	// get data with id interactive DB
	public static function getById($id)
	{
		return App::get('database')->getById(Category::$table, $id);
	}

	// insert data with interactive DB
	public static function insert($name, $gender)
	{
		$id = App::get('database')->insert(Category::$table, [
			'name' => $name,
			'gender' => $gender
			]);
		return Category::getById($id);
	}

	// delete data with id interactive DB
	public static function deleteById($id)
	{
		$cate = Category::getById($id);
		App::get('database')->deleteById(Category::$table,$id);
		return $cate;
	}

	// update data with id interactive DB
	public static function updateById($id, $name, $gender)
	{
		App::get('database')->updateById(Category::$table,
			[
			'name' => $name,
			'gender' => $gender
			],$id);
		return Category::getById($id);
	}
}

