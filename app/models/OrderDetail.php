<?php 
namespace app\models;

class OrderDetail extends Model
{
	static $table = "order_details";
	public $order_id;
    public $product_id;
    public $quantity;

    public static function getByOrderId($id)
    {
        $table = OrderDetail::$table;
        $sql = "select * from {$table} where order_id={$id}";

        $orderDetail = OrderDetail::query($sql);
        return $orderDetail;        
    }
    
    public static function deleteByOrderId($id)
    {
        $table = OrderDetail::$table;
        $sql = "delete from {$table} where order_id={$id}";

        $orderDetail = OrderDetail::queryDelete($sql);
        return $orderDetail;        
    }
}

