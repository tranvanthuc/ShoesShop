<?php 
namespace app\models;

use app\models\Model;

class Product extends Model
{
	public static $table = "products";
	public $product_detail_id;
	public $size;
	public $color;
	public $quantity;

}