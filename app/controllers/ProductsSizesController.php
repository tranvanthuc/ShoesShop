<?php

namespace app\controllers;

use app\models\ProductsSizes;

class ProductsSizesController
{
    //index
    public function index()
    {
        $productsSizes = ProductsSizes::selectAll();

        // die(var_dump($productsSizes));

        return view('productsSizes/index', compact('productsSizes'));
    }

    // insert a record of table products_sizes
    public function insert()
    {
        $productId = $_POST['productId'];
        $sizeId = $_POST['sizeId'];
        ProductsSizes::insert($productId, $sizeId);

        return redirect('productsSizes');
    }

    //get a record of table products_sizes by Id
    public function getEditProductSize()
    {
        $id = $_GET['id'];
        $productSize = ProductsSizes::getById($id)[0];

        return view('productsSizes/edit', compact('productSize'));
    }

    //post edit a record in table products_sizes
    public function postEditProductSize()
    {
        $id = $_POST['id'];
        $product_id = $_POST['productId'];
        $size_id = $_POST['sizeId'];
        ProductsSizes::updateById($id, $product_id, $size_id);

        return redirect('productsSizes');        
    }

    //delete a record in tablle products_sizes
    public function deleteProductSize()
    {
        $id =$_GET['id'];
        ProductsSizes::deleteById($id);

        return redirect('productsSizes');
    }
}
