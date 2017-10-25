<?php
namespace app\controllers;

use app\models\Order;
use app\models\OrderDetail;
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
	public function getByUserId()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {
			$id = $data['id'];
			$order = Order::getAllInfoByUserId($id);
			$success = "Success";
			$failure = "Not found Order!";
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
            $date = date("Y-m-d H:i:s"); 

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

	// delete order by id
	public function delete()
	{
		$data = Functions::getDataFromClient();

		// check send json or params
		$view = false;
		if (!$data) {
		$view = true;
		$data = $_REQUEST;        
		}
		
		if (isset($data['id'])) {
			$id = $data['id'];
			$order = Order::deleteById($id);
			$orderDetail = OrderDetail::deleteById($id);
			$success = "Success";
			$failure = "Not found order to delete !";
			if ($view) {
                return redirect('admin/orders');
            } else {
				Functions::returnAPI($order, $success, $failure);
			}
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	//index
	public function index()
	{
		$orders = Order::getDataOfOrder();
		// die(var_dump($orders));
		return view('order/index',compact('orders'));
	}

	//get order detail information
	public function getOrderDetail()
    {
        $id = $_GET['id'];
		$orders = Order::getOrderDetail($id);
		// die(var_dump($orders));

        return view('order/orderDetail',compact('orders'));
    }
	
}