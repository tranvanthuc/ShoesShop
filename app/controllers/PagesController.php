<?php
namespace app\controllers;
use utils\Functions;


class PagesController 
{
  public function index()
  {
    return view('index');
  }

  public function getSendMail()
  {
    return view('sendMail');
  }

  public function sendMail()
  {
    $data = Functions::getDataFromClient();
    if (isset($data['fullname']) && isset($data['email']) &&
      isset($data['subject'])&& isset($data['content'])) {
      
        Functions::sendMail($data);
      $success = "Send mail success !";
      Functions::returnAPI($data, $success, "");
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure);
    }
  }
  public function postSendMail()
  {
    if (isset($_POST['fullname']) && isset($_POST['email']) &&
      isset($_POST['subject'])&& isset($_POST['content'])) {
      
      if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $pathFile = Functions::attachFile($file);
        Functions::sendMail($_POST , $pathFile);
      } else {
        Functions::sendMail($_POST , "");
      }
      $success = "Send mail success !";
      Functions::returnAPI($_POST, $success, "");
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure);
    }
  }

}