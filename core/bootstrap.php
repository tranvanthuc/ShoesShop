<?php


use App\Core\App;

App::bind('config', require 'config.php');

$app['config'] = require 'config.php';

App::bind(
  'database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
  )
);

function view($nameView, $data = [])
{
  if($data)
    extract($data);

  return require "app/views/{$nameView}.view.php";
}

function redirect($path) 
{
  $link = "http://". $_SERVER['HTTP_HOST']. "/" .$path;
  return header("Location: {$link}");
}

?>