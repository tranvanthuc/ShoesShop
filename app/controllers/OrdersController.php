<?php
namespace app\controllers;

use app\models\Order;
use utils\Functions;

class OrdersController
{
	//select all data of orders
	public function getAll()
	{
		$orders = Order::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($orders, $success, $failure);
	}

	// select order with id
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {
			$id = $data['id'];
			$order = Order::getById($id);
			$success = "Success";
			$failure = "Not found Order";
			Functions::returnAPI($order, $success,$failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}			
	}

	// insert order
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['user_id'])) {
			$user_id = $data['user_id'];
            $date = CURRENT_TIMESTAMP();

            $params = [
                'user_id' => $user_id,
                'date' => $date,
            ];
            
            $order = Order::insert($params);
            $success = "Success";
            $failure = "Failure";
            Functions::returnAPI($order, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// update order
	public function update()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['user_id'])) {
			$id = $data['user_id'];   
            $params = [
                'user_id' => $user_id,
                'date' => $date,
            ];
            
            $order = Order::updateById($id, $params);
            $success = "Success";
            $failure = "Failure";
            Functions::returnAPI($order, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// delete order by id
	public function delete()
	{
		$data = Functions::getDataFromClient();
		if (isset($data['id'])) {
			$id = $data['id'];
			$order = Order::deleteById($id);
			$success = "Success";
			$failure = "Not found order to delete !";
			Functions::returnAPI($order, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	
}