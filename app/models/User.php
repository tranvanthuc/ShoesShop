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
  public static function getAll()
  {
    return App::get('database')->getAll(User::$table);
  }
  
  // insert User
  public static function insert($role_id ,$first_name, $last_name , 
  $email, $password) 
  {
    App::get('database')->insert(User::$table, [
      'role_id'=> $role_id,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' => $email,
      'password' => $password,
    ]);
  }

  // get User by id
  public static function getById($id) 
  {
    return App::get('database')->getById(User::$table, $id);
  }

  // update User by id
  public static function updateById($id, $params) 
  {
    App::get('database')->updateById(User::$table, $params, $id);
  }

  // check login
  public static function checkLogin($email, $password) 
  {
    $table = User::$table;
    $sql = "select * from {$table} where email='{$email}' and password='{$password}'";
    $user = App::get('database')->query($sql);
    
    return $user[0];
  }

  // delete User by id
  public static function deleteById($id) 
  {
    App::get('database')->deleteById(User::$table, $id);
  }
}