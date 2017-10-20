<?php 
namespace app\models;

use app\models\Model;

class User extends Model
{
  static $table = "users";
  public $email;
  public $password;
  public $first_name;
  public $last_name;
  public $phone;
  public $address;
  public $gender;

  // check login
  public static function checkLogin($email, $password) 
  {
    $table = User::$table;
    $sql = "select * from {$table} where email='{$email}' and password='{$password}'";
    $user = App::get('database')->query($sql);
    return $user;
  }

  // update password
  public static function updatePassword($id, $newPassword)
  {
    $params = ['password' => $newPassword];
    return User::updateById($id, $params);
  }

  // check data exist
  public static function checkDataExist($params) 
  {
    $user = App::get('database')->checkDataExist(User::$table, $params);
    return $user ? true : false;
  } 
}