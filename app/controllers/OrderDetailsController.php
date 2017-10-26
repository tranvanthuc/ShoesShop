<?php
namespace app\controllers;

use app\models\OrderDetail;
use app\models\Product;
use utils\Functions;

class OrderDetailsController
{
	//select all data of Order Details
	public function getAll()
	{
		$orderdetails = OrderDetail::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($orderdetails, $success, $failure);
	}
	
	//get all order details by order_id
	public function getOrderDetailByOrderId()
    {
        $id = $_GET['id'];
		$orderDetails = OrderDetail::getOrderDetailByOrderId($id);
		// die(var_dump($orders));
        return view('orders/orderDetail',compact('orderDetails'));
    }
}