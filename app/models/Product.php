<?php 
namespace app\models;

use core\App;

class Product
{
	static $table = "products";
	public $name;
	public $price;
	public $amount;
	public $image;
	public $description;
	public $category_id;

	// select all data with interactive DB
	public static function getAll()
	{
		return App::get('database')->getAll(Product::$table);
	}

	// select product with id interactive DB
	public static function getById($id)
	{
		return App::get('database')->getById(Product::$table, $id);
	}

	// insert data with interactive DB
	public static function insert()
	{

	}
}