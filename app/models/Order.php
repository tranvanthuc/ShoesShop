<?php 
namespace app\models;

class Order extends Model
{
	static $table = "orders";
	public $user_id;
	public $date;
	
	//get information by User id
	public static function getAllInfoByUserId($id)
	{
		$sql = "select ordetail.id as orderdetail_id, pro.id as product_id,users.id as user_id, 
		users.last_name, users.first_name, users.email, prodetail.name, 
			prodetail.image, pro.size, pro.color, prodetail.price, ordetail.quantity 
		from dbshoesshop.products  as pro
		inner join dbshoesshop.order_details as ordetail
		on pro.id = ordetail.product_id
		inner join dbshoesshop.orders as ord
		on ord.id = ordetail.order_id
		inner join dbshoesshop.product_details as prodetail
		on pro.product_detail_id = prodetail.id
		inner join dbshoesshop.users as users
		on users.id = ord.user_id
		where user_id = {$id}";
		$order = Product::query($sql);
		return $order;
	}
	//get all order informaton
	public static function getDataOfOrder()
	{
		$sql = "select users.first_name, users.last_name, users.email, orders.id as order_id, orders.date, 
				sum(order_details.price) as totalFee
				from dbshoesshop.users 
				inner join dbshoesshop.orders on users.id =  orders.user_id
				inner join dbshoesshop.order_details on orders.id = order_details.order_id
				group by order_details.order_id ";	
		$orders = Order::query($sql);
		return $orders;
	}

	//get information by order_id
	public static function getOrderDetail($order_id)
	{
		$sql = "select 	users.first_name, users.last_name, users.email, users.phone, users.address,	users.gender,
					orders.id as order_id, orders.date,
					order_details.quantity, order_details.product_id,
					products.size, products.color,
					product_details.name, product_details.price
					from dbshoesshop.users 
					inner join dbshoesshop.orders on users.id =  orders.user_id
					inner join dbshoesshop.order_details on orders.id = order_details.order_id
					inner join dbshoesshop.products on products.id = order_details.product_id
					inner join dbshoesshop.product_details on products.product_detail_id = product_details.id
					where orders.id = {$order_id};";
		$order = Order::query($sql);
		return $order;
	}
}

