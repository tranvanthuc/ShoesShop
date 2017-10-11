<?php 

namespace utils;

class Functions 
{
  public static function blockPage() 
  {
    $blockRoutes = ['login', 'register'];
    $currentUri = $_SERVER['REQUEST_URI']; //todos/edit/....
  
    foreach($blockRoutes as $route) 
    {
      if(strpos($currentUri, $route)){
        return true;
      }
    }
  
    return false;
  }

  // return api
  public static function returnAPI($data = [], $success = "", $failure = "")
  {
    $result ;
    if ($data) {
      $result = [
        "status" => true,
        "message" => $success,
        "results" => $data
      ];
    } else {
      $result = [
        "status" => false,
        "message" => $failure,
        "results" => $data
      ];
    }
    header('Access-Control-Allow-Origin: *');
    // header('Content-type: application/json');

    echo \json_encode($result);
  }

}