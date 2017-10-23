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

	// select order detail with id
	public function getByProductId()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {
			$id = $data['id'];
			$orderdetail = OrderDetail::getAllInfoByProductId($id);

			$success = "Success";
			$failure = "Not found Order Detail!";
			Functions::returnAPI($orderdetail, $success,$failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}			
	}
	//order detail was insert when insert order

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