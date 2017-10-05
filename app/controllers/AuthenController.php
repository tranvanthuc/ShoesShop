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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = User::checkLogin($email, $password);
    if(\sizeof($user) == 0) {
      return redirect('login');
    }
    \session_start();
    $_SESSION['user'] = $user;
    
    return \redirect('');
    
  }
}


?>