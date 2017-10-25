<?php 
namespace app\models;

use app\models\Model;

class Product extends Model
{
	static $table = "products";
	public $product_detail_id;
	public $size;
	public $color;
	public $quantity;

	public static function getProductByProDetailId($id)
	{
		$params = [
			'product_detail_id' => $id
		];

		return Product::getByParams(['*'], $params);
	}

}