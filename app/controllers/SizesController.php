<?php

namespace app\controllers;

use app\models\Size;

header("Access-Control-Allow-Origin: *");
class SizesController
{
    //index
    public function getAll()
    {
        $result ;
        try {
            $sizes = Size::getAll();

            if ($sizes) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => $sizes
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Not found data",
                    "data" => $sizes
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

    //insert new size
    public function insert()
    {
        $result ;
        try {
            $size = $_REQUEST['size'];
            Size::insert($size);

            $result = [
                "status" => true,
                "message" => "Success",
                "data" =>  $size
            ];
        } catch (Exception $e) {
            $result = [
                "status" => false,
                "message" => $e->getMessage(),
            ];
            echo json_encode($result);
        }
        echo json_encode($result);
    }

    //get size by id
    public function getById()
    {
        $result ;
        try {
            $id = $_GET['id'];
            $size = Size::getById($id)[0];

            if ($size) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => $size
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Not found data",
                    "data" => $size
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

    //update size
    public function update()
    {
        $result ;
        try {
            $id = $_REQUEST['id'];
            $size = $_REQUEST['size'];
            Size::updateById($id, $size);
       
            if ($size) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => array(
                        'id' => $id,
                        'size' => $size
                    )
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not update data",
                    "data" => array(
                        'id' => $id,
                        'size' => $size
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

    //get delete size by id
    public function delete()
    {
        $result ;
        try {
            $id = $_GET['id'];
            Size::deleteById($id);

            if (!Size::deleteById($id)) {
                $result = [
                    "status" => true,
                    "message" => "Success",
                    "data" => array(
                        'id' => $id,
                        'size' => $size
                    )
                ];
            } else {
                $result = [
                    "status" => false,
                    "message" => "Can not delete data",
                    "data" => array(
                        'id' => $id,
                        'size' => $size
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
}
