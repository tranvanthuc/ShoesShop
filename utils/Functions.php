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
  public static function returnAPI($data, $success, $failure)
  {
    $result ;
    if ($data) {
      $result = [
        "status" => true,
        "message" => $success,
        "data" => $data
      ];
    } else {
      $result = [
        "status" => false,
        "message" => $failure,
        "data" => $data
      ];
    }

    return \json_encode($result);
  }
}