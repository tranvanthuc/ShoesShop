<?php 
namespace app\models;

use core\App;

class User 
{
  static $table = "users";
  public $username;
  public $password;
  public $fullname;
  public $gender;

  // get all users
  public static function selectAll()
  {
    return App::get('database')->selectAll(User::$table);
  }

  // insert User
  public static function insert($username, $password, $fullname, $gender) {
    App::get('database')->insert(User::$table, [
      'username'=> $username,
      'password' => $password,
      'fullname' => $fullname,
      'gender' => $gender
    ]);
  }

  // get User by id
  public static function getById($id) 
  {
    return App::get('database')->getById(User::$table, $id);
  }

  // update User by id
  public static function updateById($id, $password, $fullname , $gender) {
    App::get('database')->updateById(User::$table, [
      'password' => $password,
      'fullname' => $fullname,
      'gender' => $gender,
    ], $id);
  }

  public static function checkLogin($username,$password) {
    $table = User::$table;
    $sql = "select * from {$table} where username='{$username}' and password='{$password}'";
    $user = App::get('database')->query($sql);
    
    return $user[0];
  }

  // delete User by id
  public static function deleteById($id) {
    App::get('database')->deleteById(User::$table, $id);
  }

}