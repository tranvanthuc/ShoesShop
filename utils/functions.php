<?php 

namespace utils;

function blockPage() 
{
  $blockRoutes = ['login'];
  $currentUri = $_SERVER['REQUEST_URI']; //todos/edit/....

  foreach($blockRoutes as $route) 
  {
    if(strpos($currentUri, $route)){
      return true;
    }
  }

  return false;
}

?>