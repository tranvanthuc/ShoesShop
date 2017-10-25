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

