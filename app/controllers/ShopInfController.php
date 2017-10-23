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
        Functions::returnAPI($shopInf, $success, $failure );
    }

    //update shop information
    public function update()
    {
        $data = Functions::getDataFromClient();
        //shop_id = 1
        if($data['id'] == 1 ){
            $id = $data['id'];

            $ShopInfUpdate = ShopInformation::updateById($id, $data);
            
            $success = "Update data success";
            $failure = "Failure";
            Functions::returnAPI($ShopInfUpdate, $success, $failure );
        } else {
            $failure = "Invalid data !";            
            Functions::returnAPI([], "", $failure );
        }
    }

    //index
    public function shopInf()
    {
        $shopInf = ShopInformation::getAll();    
        return view('shopInf/index',compact('shopInf'));    
    }

    //index
    public function index()
    {
        $shopInf = ShopInformation::getAll();

        //return file json to show in front-end
        // header("Access-Control-Allow-Origin: *");
        // echo json_encode($shopInf);
        // console.log(json_encode($shopInf));

        return view('shopInf',compact('shopInf'));
    }
}
