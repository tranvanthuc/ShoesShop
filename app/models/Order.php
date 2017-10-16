<?php 
namespace app\models;

use core\App;

class Order extends Model
{
	static $table = "orders";
	public $user_id;
    public $date;
}

