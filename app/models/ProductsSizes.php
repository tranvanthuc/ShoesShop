<?php

namespace app\models;

use core\App;

class ProductsSizes
{
    static $table = "products_sizes";
    public $productId;
    public $sizeId;

    //get all records in products_sizes table
    public static function getAll()
    {
        return App::get('database')->getAll(ProductsSizes::$table);
    }

    //insert 1 record inproducts_sizes table
    public static function insert($productId, $sizeId)
    {
        App::get('database')->insert(ProductsSizes::$table, [
            'product_id' => $productId,
            'size_id' => $sizeId
        ]);
    }

    //get products_sizes by Id
    public static function getById($id)
    {
        return App::get('database')->getById(ProductsSizes::$table, $id);
    }

    //Update products_sizes by Id
    public static function updateById($id, $productId, $sizeId)
    {
        App::get('database')->updateById(ProductsSizes::$table, [
            'product_id' => $productId,
            'size_id' => $sizeId
        ], $id);
    }

    //delete a record in table products_sizes by Id
    public static function deleteById($id)
    {
        App::get('database')->deleteById(ProductsSizes::$table, $id);
    }

    //get products_sizes by size_id
    public static function getProSizeBySizeId($id)
    {
        // $table = User::$table;
        // $sql = "select * from {$table} where email='{$email}' and password='{$password}'";
        // $user = App::get('database')->query($sql);
        
        // return $user[0];

        $table = ProductsSizes::$table;
        $sql = "select id from {$table} where size_id= {$id}";
        return App::get('database')->query($sql);
    }
    //get last record products_sizes
    public static function getLastRecord()
    {
        return App::get('database')->getLastRecord(ProductsSizes::$table);
    }
}
