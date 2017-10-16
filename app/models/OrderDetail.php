<?php 
namespace app\models;

use core\App;

class OrderDetail extends Model
{
	static $table = "order_details";
	public $order_id;
    public $product_id;
    public $quantity;
}

