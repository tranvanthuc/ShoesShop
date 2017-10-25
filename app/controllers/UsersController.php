<?php

namespace app\controllers;
use app\models\User;

class UsersController
{
    // get All users
    public function index()
    {
        $users = User::getAll();
        $success = "Success";
        $failure = "Failure";
        // Functions::returnAPI($users, $success, $failure );
        return view('users/index', compact('users'));

    }
}
