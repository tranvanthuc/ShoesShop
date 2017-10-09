<?php 
namespace app\controllers;

use app\models\User;

class AuthenController 
{
  public function getLogin()
  {
    return view('authen/login');
  }

  public function getLogout()
  {
    session_start();
    session_destroy();
    return view('authen/login');
  }

  public function postLogin()
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

  public function postRegister()
  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $first_name = "Thuc";
    $last_name = "Tran Van";
    $role_id = 1;

    User::insert($role_id, $first_name, $last_name, $email, $password);
    return \redirect('login');
  }
}
