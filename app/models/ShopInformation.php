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

}
