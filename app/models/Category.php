<?php 
namespace app\models;

use core\App;

class Category
{
	static $table = "categories";
	public $name;
	public $gender;

	public static function selectAll()
	{
		return App::get('database')->selectAll(Category::$table);
	}

	public static function insert($name, $gender)
	{
		return App::get('database')->insert(Category::$table, [
			'name' => $name,
			'gender' => $gender
			]);
	}

	public static function deleteById($id)
	{
		return App::get('database')->deleteById(Category::$table,$id);
	}

	public static function getById($id)
	{
		return App::get('database')->getById(Category::$table, $id);
	}

	public static function updateById($id, $name, $gender)
	{
		return App::get('database')->updateById(Category::$table,
			[
				'name' => $name,
				'gender' => $gender
			],$id);
	}
	
}

