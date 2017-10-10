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
            $id = $_POST['id'];
            $description = $_POST['description'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            ShopInformation::updateById($id, $description, $name, $address, $phone, $email);
            
            if (ShopInformation::updateById($id, $description, $name, $address, $phone, $email)) {
                $result = [
                  "status" => true,
                  "message" => "Success",
                  "data" => array(
                    'id' => $id,
                    'description' => $description,
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email
                )];
            } else {
                $result = [
                "status" => false,
                "message" => "Can not update data",
                "data" => array(
                    'id' => $id,
                    'description' => $description,
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email
                )];
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
