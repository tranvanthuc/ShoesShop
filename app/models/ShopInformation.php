<?php 

namespace app\models;

use core\App;

class ShopInformation
{
    static $table = "shop_information";
    public $description;
    public $name;
    public $address;
    public $phone;
    public $email;

    //get shop information
    public static function selectAll()
    {
        return App::get('database')->selectAll(ShopInformation::$table);
    }

    //insert information of shop
    public static function insert(
        $description,
        $name,
        $address,
        $phone,
        $email
    )
    {
        App::get('database')->insert(ShopInformation::$table,[
            'description' => $description,
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email
        ]);
    }

    //get information of shop by id
    public static function getById($id)
    {
        return App::get('database')->getById(ShopInformation::$table, $id);
    }

    //update information of shop by id
    public static function updateById(
        $id,
        $description,
        $name,
        $address,
        $phone,
        $email
    ){
        App::get('database')->updateById(ShopInformation::$table,[
            'description' => $description,
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email
        ], $id);
    }

    //delete shop information by Id
    public static function deleteById($id)
    {
        App::get('database')->deleteById(ShopInformation::$table, $id);
       
    }
}