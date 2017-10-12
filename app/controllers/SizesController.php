<?php

namespace app\controllers;

use app\models\Size;
use app\models\ProductSize;
use utils\Functions;

class SizesController
{
    //index
    public function getAll()
    {
        $sizes = Size::getAll();

        $success = "Get data success";
        $failure = "Failure";
        echo Functions::returnAPI($sizes, $success, $failure );
    }

    //insert new size
    public function insert()
    {
        //check if size exist in URI
        if (isset($_REQUEST['size']) ) {
            $size = $_REQUEST['size'];

            $checkSize = [ 'size' => $size ];
            $checkSizeExist = Size::checkDataExist($checkSize);
            //check if size not exist in DB and 25 < size < 50 
            if (!$checkSizeExist && $size > 25 && $size < 50) {
                Size::insert($size);
                $sizeData = Size::getLastRecord();

                $success = "Insert data success";
                $failure = "Failure";
                echo Functions::returnAPI($sizeData, $success, $failure );                
            } else {
                $failure = "Invalid data !";
                echo Functions::returnAPI([], "", $failure );
            }
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }  
    }

    //get size by id
    public function getById()
    {
        //check if id exist in URI       
        if (isset($_GET['id']) ){
            $id = $_GET['id'];

            $checkId = [ 'id' => $id ];
            $checkIdExist = Size::checkDataExist($checkId);            
            //check if id exist in DB    
            if($checkIdExist){
                $id = $_GET['id'];
                $sizeData = Size::getById($id)[0];

                $success = "Get data success";
                $failure = "Failure";
                echo Functions::returnAPI($sizeData, $success, $failure );
            } else {
                $failure = "Id is not exist in Database";            
                echo Functions::returnAPI([], "", $failure );        
            }
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }
    }

    //update size
    public function update()
    {
        //check if id and size exist in URI
        if (isset($_REQUEST['id']) && isset($_REQUEST['size'])) {
            $id = $_REQUEST['id'];
            $size = $_REQUEST['size'];

            $checkSize = ['size' => $size];
            $checkId = ['id' => $id];

            $checkSizeExist = Size::checkDataExist($checkSize);      
            $checkIdExist = Size::checkDataExist($checkId);
            //check if size_id exist in DB and size not exist in DB and 25 < size < 50 
            if ($checkIdExist && !$checkSizeExist && $size > 25 && $size < 50) {
                Size::updateById($id, $size);
                $sizeData = Size::getById($id);

                $success = "Update data success";
                $failure = "Failure";
                echo Functions::returnAPI($sizeData, $success, $failure );
            } else {
                $failure = "Invalid data !";
                echo Functions::returnAPI([], "", $failure );
            }
        } else {
            $failure = "Missing params";            
            echo Functions::returnAPI([], "", $failure );
        }
    }

    //delete size by id
    public function delete()
    {
        //check if id exist in URI       
        if (isset($_GET['id']) ){
            $id = $_GET['id'];

            $checkId = [ 'id' => $id ];
            $checkIdExist = Size::checkDataExist($checkId);            
            //check if id exist in DB    
            if($checkIdExist){
                $sizeData = Size::getById($id);
                Size::deleteById($id);

                $success = "Delete data success";
                $failure = "Failure";
                echo Functions::returnAPI($sizeData, $success, $failure );
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
