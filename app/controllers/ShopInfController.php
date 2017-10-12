<?php

namespace app\controllers;

use app\models\ShopInformation;
use utils\Functions;

class ShopInfController
{
    //index
    public function getAll()
    {
        $shopInf = ShopInformation::getAll();

        $success = "Get data success";
        $failure = "Failure";
        echo Functions::returnAPI($shopInf, $success, $failure );
    }

    //update shop information
    public function update()
    {
        //shop_id = 1
        if($_REQUEST['id'] == 1 ){
            $id = $_REQUEST['id'];
            $shopInf = ShopInformation::getById($id)[0];

            $params = [
                'description' => isset($_REQUEST['description']) ? $_REQUEST['description']: $shopInf->description,
                'name' => isset($_REQUEST['name']) ? $_REQUEST['name']: $shopInf->name,
                'address' =>  isset($_REQUEST['address'])? $_REQUEST['address']: $shopInf->address,
                'phone' => isset($_REQUEST['phone']) ? $_REQUEST['phone']: $shopInf->phone,
                'email' => isset($_REQUEST['email']) ? $_REQUEST['email']: $shopInf->email
            ];

            ShopInformation::updateById($id, $params);
            $ShopInfUpdate = ShopInformation::getById($id);

            $success = "Update data success";
            $failure = "Failure";
            echo Functions::returnAPI($ShopInfUpdate, $success, $failure );
        } else {
            $failure = "Failure";            
            echo Functions::returnAPI([], "", $failure );
        }
    }
}
