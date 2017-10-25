<?php 
namespace app\models;

class Order extends Model
{
	static $table = "orders";
	public $user_id;
	public $date;
	
	//get information by order id
	public static function getAllInfoById($id)
	{
		$sql = "select users.last_name, users.first_name, users.email, users.phone,
        users.address, orders.id as order_id, 
        sum( order_details.total) as subTotal
        from dbshoesshop.orders
        inner join dbshoesshop.users on users.id = orders.user_id
        inner join dbshoesshop.order_details on orders.id = order_details.order_id
        where orders.id = {$id}
        group by orders.id";
		$order = Order::query($sql);
		return $order;
	}
}

