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
        if($_REQUEST['id'] == 1 ){
            $id = $_REQUEST['id'];
            $shopInf = ShopInformation::getById(ShopInformation::$table, $data['id'])[0];

            $params = [
                'description' => isset($_REQUEST['description']) ? $_REQUEST['description']: $shopInf->description,
                'name' => isset($_REQUEST['name']) ? $_REQUEST['name']: $shopInf->name,
                'address' =>  isset($_REQUEST['address'])? $_REQUEST['address']: $shopInf->address,
                'phone' => isset($_REQUEST['phone']) ? $_REQUEST['phone']: $shopInf->phone,
                'email' => isset($_REQUEST['email']) ? $_REQUEST['email']: $shopInf->email
            ];

            ShopInformation::updateById(ShopInformation::$table, $id, $params);
            $ShopInfUpdate = ShopInformation::getById(ShopInformation::$table, $id);

            $success = "Update data success";
            $failure = "Failure";
            Functions::returnAPI($ShopInfUpdate, $success, $failure );
        } else {
            $failure = "Invalid data !";            
            Functions::returnAPI([], "", $failure );
        }
    }
}
