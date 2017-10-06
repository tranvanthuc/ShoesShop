<?php

namespace app\models;

use core\App;

class Size
{
    static $table = "sizes";
    public $size;

    //get all sizes
    public static function selectAll()
    {
        return App::get('database')->selectAll(Size::$table);
    }

    //insert new size
    public static function insert($size)
    {
        App::get('database')->insert(Size::$table,[
            'size' => $size
        ]);
    }

    //get size by id
    public static function getById($id)
    {
        return App::get('database')->getById(Size::$table, $id);
    }

    //update size by Id
    public static function updateById($id, $size)  
    {
        App::get('database')->updateById(Size::$table, [ 'size' => $size], $id);
    }

    //delete size by Id
    public static function deleteById($id)
    {
        App::get('database')->deleteById(Size::$table, $id);
    }
}