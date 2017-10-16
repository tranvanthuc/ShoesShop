<?php

namespace app\controllers;

use app\models\ShopInformation;
use utils\Functions;

class ShopInfController
{
    //index
    public function getAll()
    {
        $shopInf = ShopInformation::getAll(ShopInformation::$table);

        $success = "Get data success";
        $failure = "Failure";
        Functions::returnAPI($shopInf, $success, $failure );
    }

    //update shop information
    public function update()
    {
        $data = Functions::getDataFromClient();
        //shop_id = 1
        if($data['id'] == 1 ){
            $id = $data['id'];

            $ShopInfUpdate = ShopInformation::updateById(ShopInformation::$table, $id, $data);
            
            $success = "Update data success";
            $failure = "Failure";
            Functions::returnAPI($ShopInfUpdate, $success, $failure );
        } else {
            $failure = "Invalid data !";            
            Functions::returnAPI([], "", $failure );
        }
    }
}
