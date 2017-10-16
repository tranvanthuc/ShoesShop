<?php
namespace app\controllers;

use app\models\OrderDetail;
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

	// select order detail with id
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {
			$id = $data['id'];
			$orderdetail = OrderDetail::getById(OrderDetail::$table,$id);
			$success = "Success";
			$failure = "Not found Order Detail!";
			Functions::returnAPI($orderdetail, $success,$failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}			
	}

	// insert order detail
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['order_id']) && isset($data['product_id']) && isset($data['quantity'])) {
            $user_id = $data['order_id'];
            $product_id = $data['product_id'];
            $quantity = $data['quantity'];
            
            $params = [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ];
            
            $orderdetail = OrderDetail::insert($params);
            $success = "Success";
            $failure = "Failure";
            Functions::returnAPI($orderdetail, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete order detail by id
	public function delete()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['id'])) {
			$id = $data['id'];
			$orderdetail = OrderDetail::deleteById($id);
			$success = "Success";
			$failure = "Not found order detail to delete !";
			Functions::returnAPI($orderdetail, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	
}