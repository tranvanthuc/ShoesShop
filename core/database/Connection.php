<?php 
namespace core\database;

use \PDO;

class Connection {
  public static function make($config) {
    // turn on display errors
    ini_set('display_errors', true);
    error_reporting(E_ALL);

    try {
      $pdo = new PDO(
        $config['connection']. ';dbname='. $config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
      return $pdo;
    }catch (PDOException $e) {
      die($e->getMessage());
    }
  
  }
}


?>