<?php 
namespace app\models;

class Feedback extends Model
{
	static $table = "feedback";
	public $name;
	public $email;
	public $content;
}

