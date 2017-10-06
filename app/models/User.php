<?php 
namespace app\models;

use core\App;

class User 
{
  static $table = "users";
  public $email;
  public $password;
  public $first_name;
  public $last_name;
  public $phone;
  public $address;
  public $gender;

  // get all users
  public static function selectAll()
  {
    return App::get('database')->selectAll(User::$table);
  }
  
  // insert User
  public static function insert($email, $password, $first_name, $gender) {
    App::get('database')->insert(User::$table, [
      'email'=> $username,
      'password' => $password,
      'first_name' => $first_name,
      'gender' => $gender
    ]);
  }

  // get User by id
  public static function getById($id) 
  {
    return App::get('database')->getById(User::$table, $id);
  }

  // update User by id
  public static function updateById($id, $params) {
    App::get('database')->updateById(User::$table, $params, $id);
  }

  public static function checkLogin($email,$password) {
    $table = User::$table;
    $sql = "select * from {$table} where email='{$email}' and password='{$password}'";
    $user = App::get('database')->query($sql);
    
    return $user[0];
  }

  // delete User by id
  public static function deleteById($id) {
    App::get('database')->deleteById(User::$table, $id);
  }
}