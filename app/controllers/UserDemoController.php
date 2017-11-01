<?php

namespace app\controllers;

use app\models\UserDemo;

class UserDemoController
{
    //get all user
    public function getAll()
    {
        $users = UserDemo::getAll();
        return view('userDemos/user', compact('users'));
    }

    //get user by Id
    public function getById()
    {
        $id = $_POST['id'];
        $user = UserDemo::getById($id);
        // return view('userDemos/userDetail', compact('$user'));
    }

    //get login
    public function getLogin()
    {
        return view('userDemos/login');
    }

    //post login
    public function postLogin()
    {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $password = md5($_POST['password']);

            $error =  '';
            $paramsEmail = [
                'email' => $_POST['email']
            ];

            $checkEmailExist = UserDemo::checkDataExist($paramsEmail);

            if($checkEmailExist) {
                $user = UserDemo::checkLogin($_POST['email'],$password);

                if($user) {
                    session_start();
                    $_SESSION['user'] = $user[0];
                    return redirect('');
                }
            } else {
                $_SESSION['error'] = "Email is not exist";
            }    
        } else {
            $_SESSION['error'] = "Missing params";
        }
    }

    //logout 
    public function logout()
    {
        session_start();
        session_destroy();
        \redirect('admin/login');
    }

    //register
    public function register()
    {
        if(
            isset($_POST['email']) && 
            isset($_POST['password']) && 
            isset($_POST['first_name']) && 
            isset($_POST['last_name']) &&
            isset($_POST['role_id'])
        ) {
            $password = md5($_POST['password']);

            $paramsEmail = [
                'email' => $_POST['email']
            ];

            $checkEmailExist = UserDemo::checkDataExist($paramsEmail);
            if(!$checkEmailExist) {
                \redirect('admin/login');
            } else {
                session_start();
                $_SESSION['error'] = "Email exist";
            }
        } else {
            $_SESSION['error'] = "Missing params";
        }
    }

    

}
