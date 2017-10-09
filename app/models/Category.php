<?php 
namespace app\models;

use core\App;

class Category
{
	static $table = "categories";
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
}

