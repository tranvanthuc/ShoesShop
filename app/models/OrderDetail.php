<?php 
namespace app\models;

class OrderDetail extends Model
{
	static $table = "order_details";
	public $order_id;
    public $product_id;
    public $quantity;

    //get information by order details id
	public static function getAllInfoByProductId($id)
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
		where product_id = {$id}";
		$orderDetail = Product::query($sql);
		return $orderDetail;
    }
    
    public static function deleteByOrderId($id)
    {
        $table = OrderDetail::$table;
        $sql = "delete from {$table} where order_id={$id}";

        $orderDetail = OrderDetail::query($sql);
        return $orderDetail;
    }
}

