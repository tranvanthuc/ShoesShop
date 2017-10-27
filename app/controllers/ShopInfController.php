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
                return redirect('admin/shop-info');
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

    //Get update Image
    public function getUpdateImage()
    {
        $id = $_GET['id'];
        $shopInf = ShopInformation::getById(ShopInformation::$table, $id);
        // die(var_dump($shopInf));
        return view('shopInfo/uploadImage',compact('shopInf'));
    }

    //post update image
    public function postUpdateImage()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST['submit'])){
            //check image file is actual image or face image
            $check = getimagesize($_FILE["uploadedImage"]["tmp_name"]);
            if($check !== false) {
                echo "File name is an image - ".$check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "file is not a image";
                $uploadOk = 0;
            }
        }
        //check if file already exists
        if(\file_exists($target_file)) {
            echo "Sorry, file iexist";
            $uploadOk =0;
        }
        //check file size 
        if($_FILE["uploadedImage"]["size"] > 500000) {
            echo "Sorry, your file is too large";
            $uploadOk = 0;
        }

        //Allow certain file formats
        if(
            $imageFileType != "jpg" && 
            $imageFileType != "png" && 
            $imageFileType != "jpeg" &&
            $imageFileType != "gif"
        ) {
            echo "Sorry, only jpg, png, jpeg, gif are allowed";
            $uploadOk = 0;
        }

        //check uploadOK true or error
        if($uploadOk == 0) {
            echo "Sorry, your file is not upload.";
        } else {
            if(\move_uploaded_file($_FILE["uploadedImage"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILE["uploadedImage"]["tmp_name"]."has been upload.");
            } else {
                echo "Sorry error when uploading your file";
            }
        }
        return redirect('admin/shop-info');
    }

}
