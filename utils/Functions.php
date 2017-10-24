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
  public static function setResponseCode($code, $reason = null) {
    $code = intval($code);

    if (version_compare(phpversion(), '5.4', '>') && is_null($reason)) {
      http_response_code($code);
    } else {
      header(trim("HTTP/1.1 $code $reason"));
    }
}

  // return api
  public static function returnAPI($data = [], $success = "", $failure = "")
  {
    $result ;
    if ($data) {
      $result = [
        // "status" => true,
        // "message" => $success,
        "results" => $data
      ];
      \utils\Functions::setResponseCode(200, $success);
    } else {
      $result = [
        // "status" => false,
        // "message" => $failure,
        "results" => $data
      ];
      \utils\Functions::setResponseCode(404, $failure);
    }
    echo \json_encode($result);
  }

  // get params
  public static function getStringParams($params)
  {
    $result = [];
    $keys = array_keys($params); // 'email' 'name'
    $values = array_values($params); // 'thuc@gmail.com', 'thuc'
    $length = count($params);
    for($i=0; $i< $length; $i++) {
      if(gettype($values[$i]) === "string") {
        $temp = $keys[$i] . "=\"" .$values[$i]. "\"";
      }
      else {
        $temp = $keys[$i] . "=" .$values[$i];
      } 
      array_push($result, $temp);
    }
    return $result;
  } 

  // get json from front-end
  public static function getDataFromClient() 
  {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata, true);
    return $request;
  }

  // get array 
  public static function getArraySizes($sizes)
  {
    $result = [];
    foreach( $sizes as $key ) {
      array_push($result , $key->size);
    }
    return $result;
  }
}