<?php

namespace app\controllers; 

use app\models\ShopInformation;

class ShopInfController
{
    //index
    public function index()
    {
        $shopInf = ShopInformation::selectAll();
        // die(var_dump($shopInf));

        return view('shopInf/index',compact('shopInf'));
    }

    //return to the create page
    public function create()
    {
        return view('shopInf/create',compact('shopInf'));
    }

    //insert Information of shop
    public function store()
    {
        $description = $_POST['description'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];        
        ShopInformation::insert($description, $name, $address, $phone, $email);

        return redirect ('shopInf');
    }

    public function show()
    {
        $id = $_GET['id'];
        $shopInf = ShopInformation::getById($id)[0];
        // die(var_dump($shopInf));
        return view('shopInf/show',compact('shopInf'));
    }

    // get shop information by id
    public function getupdate()
    {
        $id = $_GET['id'];
        $shopInf = ShopInformation::getById($id)[0];
        // die(var_dump($shopInf));

        return view('shopInf/edit', compact('shopInf'));
    }

    //post edit shop information
    public function postupdate()
    {
        $id = $_POST['id'];
        $description = $_POST['description'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];        
        ShopInformation::updateById($id, $description, $name, $address, $phone, $email);

        return redirect('shopInf');
    }

    //delete information of shop
    public function delete()
    {
        $id = $_GET['id'];
        ShopInformation::deleteById($id);
        
        return redirect('shopInf');
    }
}