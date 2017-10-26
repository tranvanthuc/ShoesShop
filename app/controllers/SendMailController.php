<?php 

namespace app\controllers;
use utils\Functions;
use utils\Mail;

class SendMailController 
{
  public function sendMail()
  {
    $data = Functions::getDataFromClient();
    if (isset($data['fullname']) && isset($data['email']) &&
      isset($data['subject'])&& isset($data['content'])) {
      
        Mail::send($data);
      $success = "Send mail success !";
      Functions::returnAPI($data, $success, "");
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure);
    }
  }

  public function getSend()
  {
    return view('sendMail');
  }

  public function postSend()
  {
    if (isset($_POST['fullname']) && isset($_POST['email']) &&
      isset($_POST['subject'])&& isset($_POST['content'])) {
      if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $pathFile = Mail::attachFile($file);

        echo $pathFile;
        Mail::send($_POST , $pathFile);
      } else {
        Mail::send($_POST , "");
      }
      $success = "Send mail success !";
      Functions::returnAPI($_POST, $success, "");
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure);
    }
  }
}