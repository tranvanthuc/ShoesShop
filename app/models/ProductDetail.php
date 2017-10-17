<?php 
namespace app\models;

use app\models\Model;

class ProductDetail extends Model
{
	static $table = "product_details";
	public $name;
	public $price;
	public $image;
	public $description;
	public $category_id;
}
