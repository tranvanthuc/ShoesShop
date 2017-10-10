<?php 
namespace app\controllers;

use app\models\User;
use utils\Functions;
class AuthenController 
{
  
  public function testJson() 
  {
    
    $result ;
    try {
      $id = $_REQUEST['id'];
      $user = User::getById($id);
      if( $user) {
        $result = [
          "status" => true,
          "message" => "Success",
          "data" => $user
        ];
      } else {
        $result = [
          "status" => false,
          "message" => "Not found user {$id}",
          "data" => $user
        ];
      }
    } catch (Exception $e) {
      $result = [
        "status" => false,
        "message" => $e->getMessage(),
      ];
      echo \json_encode($result);
    }
    
    echo \json_encode($result);
  }
  
  
  public function getLogin()
  {
    return view('authen/login');
  }

  public function logout()
  {
    session_start();
    session_destroy();
    return view('authen/login');
  }

  public function login()
  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = User::checkLogin($email, $password);
    if(\sizeof($user) == 0) {
      return redirect('login');
    }
    \session_start();
    $_SESSION['user'] = $user;
    
    return \redirect('');
  }

  public function getRegister() 
  {
    return view('authen/register');
  }

  public function register()
  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $first_name = "Thuc";
    $last_name = "Tran Van";
    $role_id = 1;

    User::insert($role_id, $first_name, $last_name, $email, $password);
    return \redirect('login');
  }

  // get All users
  public function getAllUsers()
  {
    $users = User::getAll();
    $success = "Success";
    $failure = "Failure";
    echo Functions::returnAPI($users, $success, $failure );
  }
}
