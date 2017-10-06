<?php

// pages controller
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@index');
$router->post('todos', 'TodosController@insert');

// edit todo
$router->get('todos/edit','TodosController@getEditTodo');
$router->post('todos/edit','TodosController@postEditTodo');

// delete todo
$router->get('todos/delete', 'TodosController@getDeleteTodo');

// authen
$router->get('login', 'AuthenController@login');
$router->post('login', 'AuthenController@access');

// logout
$router->get('logout', 'AuthenController@logout');

// register
$router->get('register', 'AuthenController@getRegister');
$router->post('register', 'AuthenController@postRegister');


//shop_information controller
//show list information of the shop
$router->get('shopInf', 'ShopInfController@index');

//insert shop information
$router->post('shopInf', 'ShopInfController@insert');

// //update shop information
$router->get('shopInf/update', 'ShopInfController@getEditShopInf');
$router->post('shopInf/update', 'ShopInfController@postEditShopInf');

//delete shop information
$router->get('shopInf/index/shop/delete', 'ShopInfController@deleteShopInf');


//Sizes controller
//show list Sizes of the shop
$router->get('sizes', 'SizesController@index');

//insert new size
$router->post('sizes', 'SizesController@insert');

// //update size by id
$router->get('sizes/size/update', 'SizesController@getEditSize');
$router->post('sizes/size/update', 'SizesController@postEditSize');

//delete size
$router->get('sizes/index/size/delete', 'SizesController@deleteSize');


