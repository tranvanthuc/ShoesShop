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

        // check send json or params
        $view = false;
        if (!$data) {
        $view = true;
        $data = $_REQUEST;        
        }
        // die(var_dump($data));
        
        //shop_id = 1
        if($data['id'] == 1 ){
            $id = $data['id'];

            $ShopInfUpdate = ShopInformation::updateById($id, $data);
            
            $success = "Update data success";
            $failure = "Failure";
            if ($view) {
                return redirect('admin/shopInfo');
            } else {
                Functions::returnAPI($ShopInfUpdate, $success, $failure );
            }
        } else {
            $failure = "Invalid data !";            
            Functions::returnAPI([], "", $failure );
        }
    }

    //index
    public function index()
    {
        $shopInf = ShopInformation::getById(ShopInformation::$table, 1);
        // die(var_dump($shopInf));
        return view('shopInfo/index',compact('shopInf'));
    }

}
