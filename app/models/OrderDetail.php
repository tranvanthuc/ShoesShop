<?php 
namespace app\models;
class OrderDetail extends Model
{
	static $table = "order_details";
	public $order_id;
    public $name;
    public $size;    
    public $quantity;
    public $price;
    public $total;
    public static function getByOrderId($id)
    {
        $sql = "select users.last_name, users.first_name, users.email, users.phone,
        users.address, orders.id as order_id, order_details.name, 
        order_details.price, order_details.quantity,
        order_details.size, order_details.total
        from dbshoesshop.orders
        inner join dbshoesshop.users on users.id = orders.user_id
        inner join dbshoesshop.order_details on orders.id = order_details.order_id
        where orders.id ={$id};";
        $orderDetail = OrderDetail::query($sql);
        return $orderDetail;        
    }
    
    //delete all order details of order by order_id
    public static function deleteByOrderId($id)
    {
        $table = OrderDetail::$table;
        $sql = "delete from {$table} where order_id={$id}";
        // die(var_dump($sql));
        OrderDetail::queryDelete($sql);
      
    }

    //get all order details by order_id
	public static function getOrderDetailByOrderId($id)
	{
		$sql = "select 	users.first_name, users.last_name, users.email, users.address, users.phone,
		        orders.id as order_id, orders.date, order_details.name, 
                order_details.price, order_details.quantity, order_details.size, order_details.total
		        from dbshoesshop.users 
		        inner join dbshoesshop.orders on users.id =  orders.user_id
		        inner join dbshoesshop.order_details on orders.id = order_details.order_id 
                where order_details.order_id = {$id};";
        $orderDetails = OrderDetail::query($sql);
        // die(var_dump($orderDetails));
        return $orderDetails;
	}
}
