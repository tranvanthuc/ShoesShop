<?php 
namespace app\controllers;

use app\models\Feedback;
use utils\Functions;

class FeedbackController
{
  // get data in table Feedback
	public function getAll()
	{
		$feedback = Feedback::getAll();
		$success = "Success";
		$failure = "Failure";
		Functions::returnAPI($feedback, $success, $failure);
	}

	// get data with id of table Product_details
	public function getById()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['id'])) {	
			$feedback = Feedback::getById(Feedback::$table, $data['id']);
			$success = "Success";
			$failure = "Not found Feedback";

			Functions::returnAPI($feedback, $success, $failure);
		} else {
			$failure = "Missing Params";
			Functions::returnAPI([], "", $failure);
		}
	}

	// insert data table Product_details
	public function insert()
	{
		$data = Functions::getDataFromClient();
		if(isset($data['name'])
			&& isset($data['email'])
			&& isset($data['content'])
		) {
			
			$feedback = Feedback::insert($data);
			$success = "Success";
			$failure = "Failure";
			Functions::returnAPI($feedback, $success, $failure);
		} else {
			$failure = "Missing params";
			Functions::returnAPI([], "", $failure);
		}
	}

}