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
      

      $params = [
        'email' => $email
      ];
      $checkEmailExist = User::checkDataExist($paramsEmail);
      if ($checkEmailExist) {
        $user = User::checkLogin($email, md5($password));
        $success = "Login success !";
        $failure = "Password wrong !";
        echo Functions::returnAPI($user, $success, $failure );
      } else {
        $failure = "Email's not exist !";
        echo Functions::returnAPI([], "", $failure );
      }
     
    } else {
      $failure = "Missing params";
      echo Functions::returnAPI([], "", $failure );
    }
    
  }

  // register
  public function register() 
  {
    $data = Functions::getDataFromClient();
    if (isset($data['email']) && isset($data['password']) &&
        isset($data['first_name']) && isset($data['last_name']) &&
        isset($data['role_id'])
    ) {
      $data['password'] = md5($data['password']);

      $paramsEmail = [
        'email' => $data['email']
      ];

      $checkEmailExist = User::checkDataExist($paramsEmail);

      if(!$checkEmailExist) {
        $user = User::insert($data);
        $success = "Register success !";
        $failure = "Email exists !";
        Functions::returnAPI($user, $success, $failure );
      } else {
        $failure = "Email exists !";
        Functions::returnAPI([], "", $failure );
      }
    } else {
      $failure = "Missing params !";
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

      $params = [
        'id' => $id,
        'password' => $currentPassword
      ];
      $checkCurrentPassword = User::checkDataExist($params);
      $user = User::updatePassword($id, $newPassword);
      
      if(!$user) {
        $failure = "User's not exist !";
        echo Functions::returnAPI([], "", $failure );
      } else if ($checkCurrentPassword) {
        $success = "Update success !";
        echo Functions::returnAPI($user, $success, "" );
      } else {
        $failure = "Current password wrong !";
        echo Functions::returnAPI([], "", $failure );
      }
    } else {
      $failure = "Missing params !";
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

      $success = "Update success !";
      $failure = "User's not exist !";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params !";
      echo Functions::returnAPI([], "", $failure );
    }
  }

  // delete user
  public function delete() 
  {
    if(isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $user = User::deleteById($id);
      $success = "Delete success !";
      $failure = "User's not exist !";
      echo Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params !";
      echo Functions::returnAPI([], "", $failure );
    }
  } 
}
