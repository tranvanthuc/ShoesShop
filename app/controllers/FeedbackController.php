<?php 
namespace app\controllers;

use app\models\Feedback;
use utils\Functions;
use utils\Mail;

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

	// index
	public function index()
	{
		$feedback = Feedback::getAll();
		return view('feedback/index', \compact('feedback'));
	}

	// response
	public function getResponse()
	{
		$id = $_REQUEST['id'];
		$feedback = Feedback::getById(Feedback::$table, $id)[0];
		return view('feedback/response', compact('feedback'));
	}

	public function response()
  {
    if (isset($_POST['name']) && isset($_POST['email']) &&
      isset($_POST['subject'])&& isset($_POST['content'])) {
      if (isset($_FILES['file'])) {
				$file = $_FILES['file'];
        $pathFile = Mail::attachFile($file);

        echo $pathFile;
        Mail::send($_POST , $pathFile);
      } else {
        Mail::send($_POST , "");
			}
			\redirect('admin/feedback');
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure);
    }
  }
}