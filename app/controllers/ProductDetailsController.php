<?php 
namespace app\controllers;

use app\models\ProductDetail;
use utils\Functions;

class ProductDetailsController
{
	// get data in table ProductDetail
	public function getAll()
	{
		$proDetails = ProductDetail::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($proDetails, $success, $failure);
	}

	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {	
			$proDetail = ProductDetail::getById(ProductDetail::$table, $data['id']);
			$success = "Success";
			$failure = "Not found ProductDetail";
			
			Functions::returnAPI($proDetail, $success, $failure);
		} else {
			$failure = "Missing Params";
			Functions::returnAPI([], "", $failure);
		}
	}
}

