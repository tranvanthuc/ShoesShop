<?php 
namespace app\controllers;

use app\models\User;
use utils\Functions;
class AuthenController 
{
  
  // get All users
  public function getAllUsers()
  {
    $users = User::getAll();
    $success = "Success";
    $failure = "Failure";
    echo Functions::returnAPI($users, $success, $failure );
  }

  // get user by id
  public function getUserById() 
  {
    $id = $_REQUEST['id'];

    $user = User::getById($id);
    $success = "Success";
    $failure = "Not found user {$id}";
    echo Functions::returnAPI($user, $success, $failure );
  }

  // change password
  public function login()
  {
    if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      $user = User::checkLogin($email, md5($password));
      $success = "Login Success";
      $failure = "Username or password wrong";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
    
  }

  // register
  public function register() 
  {
    if(isset($_REQUEST['email']) && isset($_REQUEST['password'])
      && isset($_REQUEST['first_name']) && isset($_REQUEST['last_name'])
      && isset($_REQUEST['role_id'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $role_id = $_REQUEST['role_id'];

        $params = [
          'role_id'=> $role_id,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'password' => md5($password),
        ];
    
        $user = User::insert($params);
        $success = "Register Success";
        $failure = "Email exists";
        echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
  }

  // update password 
  public function updatePassword() 
  {
    if(
      isset($_REQUEST['id']) && 
      isset($_REQUEST['currentPassword']) && 
      isset($_REQUEST['newPassword'])
      ) {

      $currentPassword = md5($_REQUEST['currentPassword']);
      $newPassword = md5($_REQUEST['newPassword']);
      $id = $_REQUEST['id'];

      $user = User::updatePassword($id, $currentPassword, $newPassword);

      $success = "Update Success";
      $failure = "User's not exist or current password wrong";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
  }

  // update profile
  public function updateProfile()
  {
    if(
      isset($_REQUEST['id']) && 
      isset($_REQUEST['first_name']) && 
      isset($_REQUEST['last_name']) && 
      isset($_REQUEST['gender']) && 
      isset($_REQUEST['phone']) && 
      isset($_REQUEST['address'])
      ) {
      $id = $_REQUEST['id'];
      $first_name = $_REQUEST['first_name'];
      $last_name = $_REQUEST['last_name'];
      $gender = $_REQUEST['gender'];
      $phone = $_REQUEST['phone'];
      $address = $_REQUEST['address'];

      $params = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'gender' => $gender,
        'phone' => $phone,
        'address' => $address
      ];

      $user = User::updateById($id, $params);

      $success = "Update Success";
      $failure = "User's not exist";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
  }

  // delete user
  public function delete() 
  {
    if(isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $user = User::deleteById($id);
      $success = "Delete Success";
      $failure = "User's not exist";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
  } 
}
