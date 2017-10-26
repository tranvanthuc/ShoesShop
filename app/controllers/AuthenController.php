<?php 
namespace app\controllers;

use app\models\User;
use utils\Functions;
class AuthenController 
{
  // get user by ids-
  public function getUserById() 
  {
    $data = Functions::getDataFromClient();
    // check send json or params
    $view = false;
    if (!$data) {
      $view = true;
      $data = $_REQUEST;
    }
    if (isset($data['id'])) {
      $user = User::getById(User::$table, $data['id']);
      $success = "Success";
      $failure = "Not found user !";
      if ($view) {
        return view('userDetail', compact('user'));
      } else {
        Functions::returnAPI($user, $success, $failure );
      }
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure );
    }
  }

  public function getLogin()
  {
    return view('authen/login');
  }

  // login 
  public function postLogin()
  {
    $data = Functions::getDataFromClient();
    $view = false;
    if (!$data) {
      $view = true;
      $data = $_REQUEST;
    }
    if (isset($data['email'])&&isset($data['password'])) {
      $data['password'] = md5($data['password']);
      $paramsEmail = [
        'email' => $data['email']
      ];
      $checkEmailExist = User::checkDataExist($paramsEmail);
      if ($checkEmailExist) {
        $user = User::checkLogin($data['email'], $data['password']);
        $success = "Login success !";
        $failure = "Password wrong !";
        if ($view && $user) {
          session_start();
          $_SESSION['user'] = $user[0];
          return \redirect('');
        } else {
          Functions::returnAPI($user, $success, $failure );
        }
      } else {
        $failure = "Email's not exist !";
        Functions::returnAPI([], "", $failure );
      }
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure );
    }
  }

  public function logout() 
  {
    session_start();
    session_destroy();
    \redirect('admin/login');
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

      if (!$checkEmailExist) {
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
      Functions::returnAPI([], "", $failure );
    }
  }


  // update password 
  public function updatePassword() 
  {
    $data = Functions::getDataFromClient();
    if (isset($data['id']) && isset($data['newPassword']) && 
        isset($data['currentPassword'])  
    ){ 
      $currentPassword = md5($data['currentPassword']);
      $newPassword = md5($data['newPassword']);
      $id = $data['id'];

      $params = [
        'id' => $id,
        'password' => $currentPassword
      ];
      $checkCurrentPassword = User::checkDataExist($params);
      $user = User::updatePassword($id, $newPassword);
      
      if (!$user) {
        $failure = "User's not exist !";
        Functions::returnAPI([], "", $failure );
      } else if ($checkCurrentPassword) {
        $success = "Update success !";
        Functions::returnAPI($user, $success, "" );
      } else {
        $failure = "Current password wrong !";
        Functions::returnAPI([], "", $failure );
      }

    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure );
    }
  }

  // update profile
  public function updateProfile()
  {
    $data = Functions::getDataFromClient();
    if(
      isset($data['id']) && 
      isset($data['first_name']) && 
      isset($data['last_name']) && 
      isset($data['gender']) && 
      isset($data['phone']) && 
      isset($data['address'])
      ) {
      $id = $data['id'];
      $first_name = $data['first_name'];
      $last_name = $data['last_name'];
      $gender = $data['gender'];
      $phone = $data['phone'];
      $address = $data['address'];

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
      Functions::returnAPI($user, $success, $failure );
    } else {
      $failure = "Missing params !";
      Functions::returnAPI([], "", $failure );
    }
  }

  
}
