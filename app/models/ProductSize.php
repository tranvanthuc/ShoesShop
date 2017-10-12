<?php

namespace app\models;

use core\App;

class ProductSize
{
    static $table = "products_sizes";
    public $productId;
    public $sizeId;

    //get all records in products_sizes table
    public static function getAll()
    {
        return App::get('database')->getAll(ProductSize::$table);
    }

    //insert 1 record inproducts_sizes table
    public static function insert($params)
    {
        $params = [
            'product_id' => $params['product_id'],
            'size_id' => $params['size_id']
        ];
        App::get('database')->insert(ProductSize::$table,$params );
    }

    //get products_sizes by Id
    public static function getById($id)
    {
        return App::get('database')->getById(ProductSize::$table, $id);
    }

    //update products_sizes by Id
    public static function updateById($data, $id)
    {
        $params = [
            'product_id' => $data['product_id'],
            'size_id' => $data['size_id']
        ];
        App::get('database')->updateById(ProductSize::$table, $params, $id);
    }

    //delete a record in table products_sizes by Id
    public static function deleteById($id)
    {
        App::get('database')->deleteById(ProductSize::$table, $id);
    }

    //get products_sizes by size_id
    public static function getProSizeBySizeId($id)
    {
        $table = ProductSize::$table;
        $sql = "select id from {$table} where size_id= {$id}";
        return App::get('database')->query($sql);
    }
    //get last record products_sizes
    public static function getLastRecord()
    {
        return App::get('database')->getLastRecord(ProductSize::$table);
    }

    // check data exist
    public static function checkDataExist($params) 
    {
        $data = App::get('database')->checkDataExist(ProductSize::$table, $params);
        return $data ? true : false;
    } 
}