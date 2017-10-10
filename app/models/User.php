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
  public static function insert($params) 
  {
    $id = App::get('database')->insert(User::$table, $params);
    return User::getById($id);
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
    return User::getById($id);
  }

  // check login
  public static function checkLogin($email, $password) 
  {
    $table = User::$table;
    $sql = "select * from {$table} where email='{$email}' and password='{$password}'";
    $user = App::get('database')->query($sql);
    return $user;
  }

  // update password
  public static function updatePassword($id, $currentPassword, $newPassword)
  {
    $table = User::$table;
    $sql = "select * from {$table} where id='{$id}' and password='{$currentPassword}'";
    $user = App::get('database')->query($sql);
    if ($user) {
      return User::updateById($id, ['password' => $newPassword]);
    }
    return [];
  }

  // delete User by id
  public static function deleteById($id) 
  {
    $user = User::getById($id);
    App::get('database')->deleteById(User::$table, $id);
    return $user;
  }
}