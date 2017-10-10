<?php

// pages controller
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@index');
$router->post('todos', 'TodosController@store'); // post of insert

// edit todo
$router->get('todos/edit', 'TodosController@getUpdate');
$router->post('todos/edit', 'TodosController@postUpdate');

// delete todo
$router->get('todos/delete', 'TodosController@getDelete');

// authen
$router->get('login', 'AuthenController@getLogin');
$router->post('login', 'AuthenController@postLogin');

// logout
$router->get('logout', 'AuthenController@getLogout');

// register
$router->get('register', 'AuthenController@getRegister');
$router->post('register', 'AuthenController@postRegister');

// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shopInf', 'ShopInfController@getAll');

//return to create shop information page
$router->get('shopInf/getById', 'ShopInfController@getById');

// insert shop information
// $router->post('shopInf/', 'ShopInfController@insert');

// //update shop information
$router->post('shopInf/update', 'ShopInfController@update');

// //delete shop information
// $router->get('shopInf/shop/delete', 'ShopInfController@delete');

// ----------------------------Sizes controller----------------//
//show list Sizes of the shop
$router->get('sizes', 'SizesController@getAll');

//show list Sizes of the shop
$router->get('size/getById', 'SizesController@getById');

//insert new size
$router->post('sizes/insert', 'SizesController@insert');

$router->post('size/update', 'SizesController@update');

//delete size
$router->get('size/delete', 'SizesController@delete');

// ----------------------------ProductsSizes controller----------------//
//show list ProductsSizes of the shop
$router->get('productsSizes', 'ProductsSizesController@getAll');

//get productsSizes by id
$router->get('productsSizes/getById', 'ProductsSizesController@getById');

//insert new ProductsSizes
$router->post('productsSizes/insert', 'ProductsSizesController@insert');

//update size by id
$router->post('productSize/update', 'ProductsSizesController@update');

//delete size
$router->get('productSize/delete', 'ProductsSizesController@delete');
