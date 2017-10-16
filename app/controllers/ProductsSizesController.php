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
        //check if product_id anf size_id exist in URI
        if(isset($_REQUEST['product_id']) && isset($_REQUEST['size_id'])){
            $productId = $_REQUEST['product_id'];
            $sizeId = $_REQUEST['size_id'];

            $paramsCheckExist = [
                'product_id' => $productId,
                'size_id' => $sizeId
            ];  
            $checkSize = [ 'id' => $sizeId ];
            
            $checkSizeExist = Size::checkDataExist($checkSize);
            $checkExist = ProductSize::checkDataExist($paramsCheckExist); 
            // die(var_dump($checkSize));
            
            //check if size_id exist in DB and (product_id, size_id) not exist in DB
            if( $checkSizeExist && !$checkExist ){
                    ProductSize::insert($paramsCheckExist);
                    // die(var_dump( ProductSize::insert($productId, $sizeId)));
                    $productSizeData = ProductSize::getLastRecord();

                    $success = "Insert data success";
                    $failure = "Failure";
                    echo Functions::returnAPI($productSizeData, $success, $failure );                
            } else {
                $failure = "Data exists";            
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
        //check if id exist in URI       
        if (isset($_GET['id']) ){
            $id = $_GET['id'];

            $checkId = [ 'id' => $id ];
            $checkIdExist = ProductSize::checkDataExist($checkId);            
            //check if id exist in DB    
            if($checkIdExist){
                $productSize = ProductSize::getById($id)[0];

                $success = "Get data success";
                $failure = "Failure";
                echo Functions::returnAPI($productSize, $success, $failure );
            } else {
                $failure = "Id not exist in Database";            
                echo Functions::returnAPI([], "", $failure );        
            }
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }
    }

    //update a record in table products_sizes
    public function update()
    {        
        //check if id exist in URI
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];

            $productSize = ProductSize::getById($id)[0];                    
            $params = [
                'product_id' => $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id']: $productSize->product_id,                
                'size_id' => $size_id =isset($_REQUEST['size_id']) ? $_REQUEST['size_id']: $productSize->size_id                
            ];
            $checkId = ['id'=> $id];
            $checkSizeId = ['id' => $params['size_id']];

            $checkIdExist = ProductSize::checkDataExist($checkId);
            $checkSizeExist = Size::checkDataExist($checkSizeId);                
            $checkExist = ProductSize::checkDataExist($params); 
            // die(var_dump($checkIdExist));           
            //check if size exist in DB
            //Check if record has productsize_id and size_id not exist in DB 
            //check if productSize_id exist in DB
            if ($checkIdExist && $checkSizeExist && !$checkExist) {
                ProductSize::updateById($params, $id);
                $productSizeData = ProductSize::getById($id);

                $success = "Update data success";
                $failure = "Update Failure";
                echo Functions::returnAPI($productSizeData, $success, $failure );
            } else {
                $failure = "Invalid data !";
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
        //check if id exist in URI       
        if (isset($_GET['id']) ){
            $id = $_GET['id'];

            $checkId = [ 'id' => $id ];
            $checkIdExist = ProductSize::checkDataExist($checkId);            
            //check if id exist in DB    
            if($checkIdExist){
                $id =$_GET['id'];
                $productsSizes = ProductSize::getById($id);
                ProductSize::deleteById($id);

                $success = "Delete data success";
                $failure = "Delete Failure";
                echo Functions::returnAPI($productsSizes, $success, $failure );
            } else {
                $failure = "Id is not exist in Database";            
                echo Functions::returnAPI([], "", $failure );        
            }
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }
    }
}
