<?php 
namespace app\models;

use core\App;

class Invoice extends Model
{
	static $table = "invoices";
	public $user_id;
    public $product_id;
    public $quanlity;

    public static function getInvoicesByUserId($user_id)
    {
        $table = Invoice::$table;
    }

}
