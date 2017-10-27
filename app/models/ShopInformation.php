<?php

namespace app\models;

use app\models\Model;

class ShopInformation extends Model
{
    static $table = "shop_information";
    public $description;
    public $name;
    public $address;
    public $phone;
    public $email;

    public static function uploadImage($imagePath)
    {
        $table = ShopInformation::$table;
        $sql = "Update {$table} set image = '{$imagePath}' where id= 1";
        ShopInformation::queryDelete($sql);
    }

}
