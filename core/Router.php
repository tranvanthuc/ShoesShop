<?php

namespace core;

use app\controllers;

class Router 
{
  public $routes = [
    'GET' => [],
    'POST' => []
  ];

  // load
  public static function load($file)
  {
    $router = new static;

    require $file;

    return $router;
  }

  // define
  public function define($routes) 
  {
    $this->routes = $routes;
  }

  // get
  public function get($uri, $controller)
  {
    
    return $this->routes['GET'][$uri] = $controller;
  }

  // post
  public function post($uri, $controller)
  {
    return $this->routes['POST'][$uri] = $controller;
  }

  // direct
  public function direct($uri, $requestType) 
  {
    if(array_key_exists($uri, $this->routes[$requestType])) {
      
      return $this->callAction(
        ...explode('@', $this->routes[$requestType][$uri])
      );
    }

    throw new Exception('No route defined for this URI.');
  }

  // call action
  protected function callAction($controller, $action)
  {
    $controller = "app\\controllers\\{$controller}";

    $controller = new $controller;
    
    if (!method_exists($controller, $action)) {
      throw new Exception (
        "{$controller} does not responsed to the {$action} action."
      );
    }
    return (new $controller)->$action();
  }
}