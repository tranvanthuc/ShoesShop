<?php

namespace app\controllers;

use app\models\ShopInformation;

header("Access-Control-Allow-Origin: *");
class ShopInfController
{
    //index
    public function getAll()
    {
        $result ;
        try {
            $shopInf = ShopInformation::getAll();

            if ($shopInf) {
                $result = [
                  "status" => true,
                  "message" => "Success",
                  "data" => $shopInf
                ];
            } else {
                $result = [
                "status" => false,
                "message" => "Not found data",
                "data" => $shopInf
                ];
            }
        } catch (Exception $e) {
            $result = [
            "status" => false,
            "message" => $e->getMessage(),
            ];
            echo json_encode($result);
        }
        echo json_encode($result);
    }

    // //insert Information of shop
    // public function store()
    // {
    //     try {
    //         $description = $_POST['description'];
    //         $name = $_POST['name'];
    //         $address = $_POST['address'];
    //         $phone = $_POST['phone'];
    //         $email = $_POST['email'];
    //         ShopInformation::insert($description, $name, $address, $phone, $email);
    //         return true;
    //     } catch (Exception $e) {
    //         die($e->getMessage());
    //         return false;
    //     }
    // }

    // get shop information by id
    public function getById()
    {
        $result ;
        try {
            $id = $_GET['id'];
            $shopInf = ShopInformation::getById($id)[0];

            if ($shopInf) {
                $result = [
                  "status" => true,
                  "message" => "Success",
                  "data" => $shopInf
                  ];
            } else {
                $result = [
                "status" => false,
                "message" => "Not found data",
                "data" => $shopInf
                ];
            }
        } catch (Exception $e) {
            $result = [
            "status" => false,
            "message" => $e->getMessage(),
            ];
            echo json_encode($result);
        }
        echo json_encode($result);
    }

    //update shop information
    public function update()
    {
        $result ;
        try {
            if (isset($_GET['id']) &&
                isset($_REQUEST['description']) &&
                isset($_REQUEST['name']) &&
                isset($_REQUEST['address']) &&
                isset($_REQUEST['phone']) &&
                isset($_REQUEST['email'])
            ) {
                $id = $_REQUEST['id'];
                $description = $_REQUEST['description'];
                $name = $_REQUEST['name'];
                $address = $_REQUEST['address'];
                $phone = $_REQUEST['phone'];
                $email = $_REQUEST['email'];
            }

            ShopInformation::updateById($id, $description, $name, $address, $phone, $email);
            
            if ($id) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => ShopInformation::getLastRecord()
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not update data",
                    "data" => ShopInformation::getLastRecord()
                ];
            }
        } catch (Exception $e) {
            $result = [
                "status" => false,
                "message" => $e->getMessage(),
            ];
            echo json_encode($result);
        }
        echo json_encode($result);
    }

    // //delete information of shop
    // public function delete()
    // {
    //     try {
    //         $id = $_GET['id'];
    //         ShopInformation::deleteById($id);
    //         return true;
    //     } catch (Exception $e) {
    //         die($e->getMessage());
    //         return false;
    //     }
        
    //     // return redirect('shopInf');
    // }
}
