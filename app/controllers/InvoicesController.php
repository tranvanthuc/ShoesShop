<?php

namespace app\controllers;

use app\models\Invoice;
use utils\Functions;

class InvoicesController
{
    //get all data of the table invoices
    public function getAll()
    {
        $invoices = Invoice::getAll();
        $success = "Success";
        $failure = "Failure";
        Functions::returnAPI($invoices,$success, $failure);
    }

    //get data by id
    public function getById()
    {
        $data = Functions::getDataFromClient();
        if (isset($data['id'])) {
            $id = $data['id'];
            $invoice = Invoice::getById($id);
            $success = "Success";
            $failure = "Invoice is not found !";

            Functions::returnAPI($invoice, $success, $failure);
        } else {
            $failure = "Missing params";

            Functions::returnAPI([], "", $failure);
        }
    }

    //get data by user id
    public function getByUserId()
    {
        $data = Functions::getDataFromClient();
        if (isset($data['user_id'])) {
            $user_id = $data['user_id'];
            $invoice = Invoice::getById($user_id);
            $success = "Success";
            $failure = "Invoice is not found !";

            Functions::returnAPI($invoice, $success, $failure);
        } else {
            $failure = "Missing params";

            Functions::returnAPI([], "", $failure);
        }
    }

    //get data by product id
    public function getByProductId()
    {
        $data = Functions::getDataFromClient();
        if (isset($data['product_id'])) {
            $product_id = $data['product_id'];
            $invoice = Invoice::getById($product_id);
            $success = "Success";
            $failure = "Invoice is not found !";

            Functions::returnAPI($invoice, $success, $failure);
        } else {
            $failure = "Missing params";

            Functions::returnAPI([], "", $failure);
        }
    }

    //Insert data to invoices table
    public function insert()
    {
        $data = Functions::getDataFromClient();
        if (isset($data['user_id']) && 
            isset($data['product_id']) && 
            isset($data['quantity'])) {
                $params = [
                    'user_id' => $data['user_id'],
                    
                ];
        } else {
            $failure = "Missing params";
            Functions::returnAPI([], "", $failure);
        }
    }


}