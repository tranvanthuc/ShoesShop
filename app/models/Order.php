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

	//get all order informaton
	public static function getDataOfOrder()
	{
		$sql = "select users.first_name, users.last_name, users.email, orders.id as order_id, orders.date, 
				sum(order_details.total) as totalFee
				from dbshoesshop.users 
				inner join dbshoesshop.orders on users.id =  orders.user_id
				inner join dbshoesshop.order_details on orders.id = order_details.order_id
				group by order_details.order_id ";	
		$orders = Order::query($sql);
		return $orders;
	}

	//get product quantity by name and size
	public static function getproductQuantity($product_detail_id, $size)
	{
		$sql = "select quantity, id from dbshoesshop.products where product_detail_id='{$product_detail_id}' and size={$size} limit 1";
		$productQUantity = Order::query($sql);
		return $productQUantity;
	}

	//minus quantity after insert into order
	public static function updateProductQUantity($minusQuantity, $quantity, $id)
	{
		$resultQuantity = $quantity- $minusQuantity;
		$sql = "update dbshoesshop.products set quantity = {$resultQuantity} where id = {$id}";
		Order::queryDelete($sql);
		// return $productQUantity;
	}
}