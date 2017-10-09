<?php

namespace app\controllers;
use app\models\Size;

class SizesController
{
    //index
    public function index()
    {
        $sizes = Size::selectAll();

        return view('sizes/index', compact('sizes'));
    }

    //insert new size
    public function store()
    {
        $size = $_POST['size'];
        Size::insert($size);

        return redirect('sizes');
    }

    //return to the create page
    public function create()
    {
        return view('sizes/create');
    }

    //Show size
    public function show()
    {
        $id = $_GET['id'];
        $size = Size::getById($id)[0];

        return view('sizes/show', compact('size'));
    }

    //get edit size
    public function getupdate()
    {
        $id = $_GET['id'];
        $size = Size::getById($id)[0];

        return view('sizes/edit', compact('size'));
    }

    //post edit size
    public function postupdate()
    {
        $id = $_POST['id'];
        $size = $_POST['size'];
        Size::updateById($id, $size);

        return redirect('sizes');
    }

    //get delete size by id
    public function delete()
    {
        $id = $_GET['id'];
        Size::deleteById($id);

        return redirect('sizes');
    }
}