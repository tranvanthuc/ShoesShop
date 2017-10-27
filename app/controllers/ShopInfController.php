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

            $shopInfUpdate = ShopInformation::updateById($id, $data);

            $success = "Update data success";
            $failure = "Failure";
            if ($view) {
                return redirect('admin/shop-info');
            } else {
                Functions::returnAPI($shopInfUpdate, $success, $failure );
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
        // die(var_dump( $shopInf));
        return view('shopInfo/index',compact('shopInf'));
    }

    //post update image
    public function uploadImage()
    {
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["uploadedImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $status= '';
        if(isset($_POST['submit'])){
            // die(var_dump(isset($imageFileType)));
            //check image file is actual image or face image
            $check = getimagesize($_FILES["uploadedImage"]["tmp_name"]);
            if($check !== false) {
                $status = "File name is an image - ".$check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $status = "file is not a image";
                $uploadOk = 0;
            }
        }
        
        //check if file already exists
        if(\file_exists($target_file)) {
            $status = $status."\n Sorry, file is exist";
            $uploadOk =0;
        }
        //check file size 
        if($_FILES["uploadedImage"]["size"] > 500000) {
            $status = "Sorry, your file is too large";
            $uploadOk = 0;
        }

        //Allow certain file formats
        if(
            $imageFileType != "jpg" && 
            $imageFileType != "png" && 
            $imageFileType != "jpeg" &&
            $imageFileType != "gif"
        ) {
            $status = $status."\n Sorry, only jpg, png, jpeg, gif are allowed";
            $uploadOk = 0;
        }

        //check uploadOK true or error
        if($uploadOk == 0) {
            $status = $status."\n Sorry, your file is not upload.";
        } else {
            if(\move_uploaded_file($_FILES["uploadedImage"]["tmp_name"], $target_file)) {
                $status = $status."\n The file " . basename($_FILES["uploadedImage"]["tmp_name"]." has been upload.");
                ShopInformation::uploadImage($_FILES["uploadedImage"]["name"]);                
            } else {
                $status = $status."\n Sorry error when uploading your file";
            }            
        } 
        return redirect('admin/shop-info');            
    }

}
