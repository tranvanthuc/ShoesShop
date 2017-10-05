<?php 

namespace app\controllers;

use app\models\User;

class AuthenController 
{
  public function login()
  {
    return view('authen/login');
  }

  public function logout()
  {
    \session_start();
    session_destroy();
    return view('authen/login');
  }

  public function access()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = User::checkLogin($username, $password);
    if(\sizeof($user) == 0) {
      return redirect('login');
    }
    \session_start();
    $_SESSION['user'] = $user;
    
    return \redirect('');
    
  }
}


?>