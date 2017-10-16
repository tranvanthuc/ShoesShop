<?php 
namespace app\models;

class Order extends Model
{
	static $table = "orders";
	public $user_id;
    public $date;
}

