<?php

namespace app\models;

use app\models\Model;

class UserDemo extends Model
{
    static $table = "users";
    public $firstName;
    public $lastName;
    public $password;
    public $email;
    public $avartar;
    public $gender;
    public $phone;
    public $address;

    //check login
    public static function checkLogin($email, $password)
    {
        $table = User::$table;
        $sql = "Select * from users where email = {$email} and password = {$password}";
        $user = UserDemo::query($sql);
        return $user;
    }

}