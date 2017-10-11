<?php

namespace app\controllers;

use app\models\Size;
use app\models\ProductSize;
use utils\Functions;

class ProductsSizesController
{
    //index
    public function getAll()
    {
        $productsSizes = ProductSize::getAll();

        $success = "Get data success";
        $failure = "Failure";
        echo Functions::returnAPI($productsSizes, $success, $failure );
    }

    // insert a record of table products_sizes
    public function insert()
    {
        if(isset($_REQUEST['product_id']) && isset($_REQUEST['size_id'])){
            $productId = $_REQUEST['product_id'];
            $sizeId = $_REQUEST['size_id'];

            $checkSizeExits = Size::checkDataExist($sizeId);
            if($checkSizeExits){
                $paramsCheckExist = [
                    'product_id' => $productId,
                    'size_id' => $sizeId
                ];

                $checkExist = ProductSize::checkDataExist($paramsCheckExist);
                if(!$checkExist) {
                    ProductSize::insert($productId, $sizeId);
                    $productSizeData = ProductSize::getLastRecord();

                    $success = "Insert data success";
                    $failure = "Failure";
                    echo Functions::returnAPI($productSizeData, $success, $failure );
                } else {
                    $failure = "Data exists";
                    echo Functions::returnAPI([], "", $failure );
                }
            } else {
                $failure = "Size is not exist";            
                echo Functions::returnAPI([], "", $failure );
            }            
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }
    }

    //get a record of table products_sizes by Id
    public function getById()
    {
        $id = $_GET['id'];
        $productSize = ProductSize::getById($id)[0];

        $success = "Get data success";
        $failure = "Failure";
        echo Functions::returnAPI($productSize, $success, $failure );
    }

    //post edit a record in table products_sizes
    public function update()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $productSize = ProductSize::getById($id)[0];
            // die(var_dump($productSize));
            $params = [
                'product_id' => $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id']: $productSize->product_id,                
                'size_id' => $size_id =isset($_REQUEST['size_id']) ? $_REQUEST['size_id']: $productSize->size_id                
            ];
            
            $checkSize = Size::checkDataExist($size_id);
            // die(var_dump($checkSize));

            $checkExist = ProductSize::checkDataExist($params);
            // die(var_dump($params));

            if(!$checkExist && $checkSize) {
                ProductSize::updateById($params, $id);
                $productSizeData = ProductSize::getById($id);

                $success = "Update data success";
                $failure = "Failure";
                echo Functions::returnAPI($productSizeData, $success, $failure );
            } else {
                $failure = "Failure";
                echo Functions::returnAPI([], "", $failure );
            }
        } else {
            $failure = "Failure";            
            echo Functions::returnAPI([], "", $failure );
        }
    }

    //delete a record in tablle products_sizes
    public function delete()
    {
        $id =$_GET['id'];
        $productsSizes = ProductSize::getById($id);
        ProductSize::deleteById($id);

        $success = "Delete data success";
        $failure = "Failure";
        echo Functions::returnAPI($productsSizes, $success, $failure );
    }
}
