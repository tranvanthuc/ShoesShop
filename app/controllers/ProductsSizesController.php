<?php

namespace app\controllers;

use app\models\ProductsSizes;

class ProductsSizesController
{
    //index
    public function index()
    {
        $productsSizes = ProductsSizes::selectAll();
        
        //return file json to show in front-end
        header("Access-Control-Allow-Origin: *");
		echo json_encode($productsSizes);
        
        // return view('productsSizes/index', compact('productsSizes'));
    }

    // insert a record of table products_sizes
    public function store()
    {
        try{
            $productId = $_POST['productId'];
            $sizeId = $_POST['sizeId'];
            ProductsSizes::insert($productId, $sizeId);  
            return true;      
        } catch(Exception $e){
            die($e->getMessage());
            return false;
        }
        

        // return redirect('productsSizes');
    }

    //return to the create page
    public function create()
    {
        return view('productsSizes/create',compact('shopInf'));
    }

    //get a record of table products_sizes by Id
    public function show()
    {
        $id = $_GET['id'];
        $productSize = ProductsSizes::getById($id)[0];

        //return file json to show in front-end
        header("Access-Control-Allow-Origin: *");
        echo json_encode($productSize);

        // return view('productsSizes/shpw', compact('productSize'));
    }

    //get a record of table products_sizes by Id
    public function getupdate()
    {
        $id = $_GET['id'];
        $productSize = ProductsSizes::getById($id)[0];

        //return file json to show in front-end
        header("Access-Control-Allow-Origin: *");
        echo json_encode($productSize);

        // return view('productsSizes/edit', compact('productSize'));
    }

    //post edit a record in table products_sizes
    public function postupdate()
    {
        try{
            $id = $_POST['id'];
            $product_id = $_POST['productId'];
            $size_id = $_POST['sizeId'];
            ProductsSizes::updateById($id, $product_id, $size_id);
            return true;
        } catch(Exception $e){
            die($e->getMessage());
            return false;
        }

        return redirect('productsSizes');        
    }

    //delete a record in tablle products_sizes
    public function delete()
    {
        try{
            $id =$_GET['id'];
            ProductsSizes::deleteById($id);
            return true;
        } catch(Exception $e){
            die($e->getMessage());
            return false;
        }

        // return redirect('productsSizes');
    }
}
