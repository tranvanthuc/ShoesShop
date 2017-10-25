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
		if(isset($data['user_id'])) {
			$id = $data['user_id'];
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

            $paramsOrder = [
                'user_id' => $user_id,
                'date' => $date,
			];            
			//insert order: id, user_id, date
			$order = Order::insert($paramsOrder);	

			//Get id of inserted order
			$orderId = $order[0]->id;

			//data result(return json)
			$resultArray = array("user_id" => $user_id);

			//order detail array
			$orderDetailArray = array();

			// params of order detail inserted
			$paramsOrderDetail = array();

			//Read json of order detail to insert
			for($i=0; $i< count($data['products']); $i++){
				if(
					isset($data['products'][$i]['id']) && 
					isset($data['products'][$i]['size']) &&	
					isset($data['products'][$i]['quantity']) &&
					isset($data['products'][$i]['price'])
				) {
					$productId = Order::getProductId($data['products'][$i]['id'],$data['products'][$i]['size'] );
					// die(var_dump($productId ));
					$paramsOrderDetail = [
						'order_id' => $orderId,
						'product_id' => $productId[0]->id,						
						'quantity' => $data['products'][$i]['quantity'],
						'price' => $data['products'][$i]['price']
					];

					$orderDetail = OrderDetail::insert($paramsOrderDetail);

					// push data to order detail inserted array
					array_push($orderDetailArray,$paramsOrderDetail); 

				} else {
					$failure = "Missing params";
					Functions::returnAPI([], "", $failure);
					break;
				}		
			}
			
			$resultArray["products"] = $orderDetailArray;			

			$success = "Success";
			$failure = "Failure";
			Functions::returnAPI($resultArray , $success, $failure);

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

			$orderDetail = OrderDetail::getByOrderId($id);
			OrderDetail::deleteByOrderId($id);

			$order = Order::deleteById($id);
			
			$result["order"] = $order;
			$result["order_details"] = $orderDetail;

			$success = "Success";
			$failure = "Not found order to delete !";
			Functions::returnAPI($result, $success, $failure);
			// die("Delete success");
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

	
}