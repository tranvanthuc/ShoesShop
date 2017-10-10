<?php

// CategoryController
$router->get('cates', 'CategoriesController@index');
$router->get('cate/create', 'CategoriesController@create');
$router->post('cate/store', 'CategoriesController@store');
$router->get('cate/delete', 'CategoriesController@delete');
$router->get('cate/getUpdate', 'CategoriesController@getUpdate');
$router->post('cate/postUpdate', 'CategoriesController@postUpdate');

// authen
$router->get('login', 'AuthenController@getLogin');
$router->post('login', 'AuthenController@login');
$router->get('users', 'AuthenController@getAllUsers');
$router->get('users/user', 'AuthenController@getUserById');
$router->post('user/update-password', 'AuthenController@updatePassword');
// $router->post('user/update-profile', 'AuthenController@updateProfile');

// logout
$router->get('logout', 'AuthenController@logout');

// register
$router->get('register', 'AuthenController@getRegister');
$router->post('register', 'AuthenController@register');


// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shopInf', 'ShopInfController@getAll');

//return to create shop information page
$router->get('shopInf/shop', 'ShopInfController@getById');

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
$router->get('sizes/size', 'SizesController@getById');

//insert new size
$router->post('size/insert', 'SizesController@insert');

$router->post('size/update', 'SizesController@update');

//delete size
$router->get('size/delete', 'SizesController@delete');

// ----------------------------ProductsSizes controller----------------//
//show list ProductsSizes of the shop
$router->get('productsSizes', 'ProductsSizesController@getAll');

//get productsSizes by id
$router->get('productsSizes/productSize', 'ProductsSizesController@getById');

//insert new ProductsSizes
$router->post('productSize/insert', 'ProductsSizesController@insert');

//update size by id
$router->post('productSize/update', 'ProductsSizesController@update');

//delete size
$router->get('productSize/delete', 'ProductsSizesController@delete');




//------------------Test -------------- 

// test json 
$router->get('json', 'AuthenController@testJson');

// pages controller
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@getAll');
$router->post('todos', 'TodosController@insert'); // post of insert

// edit todo
$router->get('todos/edit', 'TodosController@getById');
$router->post('todos/edit', 'TodosController@update');

// delete todo
$router->get('todos/delete', 'TodosController@delete');
