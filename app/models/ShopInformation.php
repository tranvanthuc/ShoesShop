<?php

namespace app\models;

use core\App;
use app\models\Model;

class ShopInformation extends Model
{
    static $table = "shop_information";
    public $description;
    public $name;
    public $address;
    public $phone;
    public $email;

    // //get shop information
    // public static function getAll()
    // {
    //     return App::get('database')->getAll(ShopInformation::$table);
    // }
    
    // //get information of shop by id
    // public static function getById($id)
    // {
    //     return App::get('database')->getById(ShopInformation::$table, $id);
    // }

    // //update information of shop by id
    // public static function updateById($id, $data) 
    // {
    //     $params = [
    //         'description' => $data['description'],
    //         'name' => $data['name'],
    //         'address' => $data['address'],
    //         'phone' => $data['phone'],
    //         'email' => $data['email']
    //     ];
    //     App::get('database')->updateById(ShopInformation::$table, $params, $id);
    // }
}
