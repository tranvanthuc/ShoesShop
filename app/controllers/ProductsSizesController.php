<?php

namespace app\controllers;

use app\models\ProductsSizes;

header("Access-Control-Allow-Origin: *");
class ProductsSizesController
{
    //index
    public function getAll()
    {
        $result ;
        try {
            $productsSizes = ProductsSizes::getAll();

            if ($productsSizes) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => $productsSizes
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Not found data",
                    "data" => $productsSizes
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

    // insert a record of table products_sizes
    public function insert()
    {
        $result ;
        try {
            $productId = $_POST['productId'];
            $sizeId = $_POST['sizeId'];
            ProductsSizes::insert($productId, $sizeId);
            
            if (ProductsSizes::insert($productId, $sizeId)) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => array(
                        "productId" => $productId,
                        "sizeId" => $sizeId
                    )
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not insert data",
                    "data" => array(
                        "productId" => $productId,
                        "sizeId" => $sizeId
                    )
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

    //get a record of table products_sizes by Id
    public function getById()
    {
        $result ;
        try {
            $id = $_GET['id'];
            $productSize = ProductsSizes::getById($id)[0];

            if ($productSize) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => $productSize
                  ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Not found data",
                    "data" => $productSize
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

    //post edit a record in table products_sizes
    public function update()
    {
        $result ;
        try {
            $id = $_POST['id'];
            $product_id = $_POST['productId'];
            $size_id = $_POST['sizeId'];
            ProductsSizes::updateById($id, $product_id, $size_id);
            
            if (ProductsSizes::updateById($id, $product_id, $size_id)) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => array(
                        'id' => $id,
                        'product_id' => $product_id,
                        'size_id' => $size_id
                    )
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not update data",
                    "data" => array(
                        'id' => $id,
                        'product_id' => $product_id,
                        'size_id' => $size_id
                    )
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

    //delete a record in tablle products_sizes
    public function delete()
    {
        $result ;
        try {
            $id =$_GET['id'];
            ProductsSizes::deleteById($id);

            if (!ProductsSizes::deleteById($id)) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => $id
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not delete data",
                    "data" => $id
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
}
