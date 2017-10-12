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

	public static function getAll()
	{
		return App::get('database')->getAll(Product::$table);
	}
}