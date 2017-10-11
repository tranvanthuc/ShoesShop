<?php

// home pages
$router->get('', 'PagesController@index');



// CategoryController
$router->get('cates', 'CategoriesController@index');
$router->get('cate/create', 'CategoriesController@create');
$router->post('cate/store', 'CategoriesController@store');
$router->get('cate/delete', 'CategoriesController@delete');
$router->get('cate/getUpdate', 'CategoriesController@getUpdate');
$router->post('cate/postUpdate', 'CategoriesController@postUpdate');




// users
$router->get('users', 'AuthenController@getAllUsers');
$router->get('users/user', 'AuthenController@getUserById');
$router->post('user/update-password', 'AuthenController@updatePassword');
$router->post('user/update-profile', 'AuthenController@updateProfile');
$router->get('user/delete', 'AuthenController@delete');


// login
$router->post('login', 'AuthenController@login');

// register
$router->post('register', 'AuthenController@register');


// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shop-inf', 'ShopInfController@getAll');

// //update shop information
$router->post('shop-inf/update', 'ShopInfController@update');

// //return to create shop information page
// $router->get('shopInf/shop', 'ShopInfController@getById');

// insert shop information
// $router->post('shopInf/', 'ShopInfController@insert');

// //delete shop information
// $router->get('shopInf/shop/delete', 'ShopInfController@delete');

// ----------------------------Sizes controller----------------//
//show list Sizes of the shop
$router->get('sizes', 'SizesController@getAll');

//show list Sizes of the shop
$router->get('sizes/size', 'SizesController@getById');

//insert new size
$router->post('size/insert', 'SizesController@insert');

//update new size
$router->post('size/update', 'SizesController@update');

//delete size
$router->get('size/delete', 'SizesController@delete');

// ----------------------------ProductsSizes controller----------------//
//show list ProductsSizes of the shop
$router->get('products-sizes', 'ProductsSizesController@getAll');

//get productsSizes by id
$router->get('products-sizes/product-size', 'ProductsSizesController@getById');

//insert new ProductsSizes
$router->post('product-size/insert', 'ProductsSizesController@insert');

//update size by id
$router->post('product-size/update', 'ProductsSizesController@update');

//delete size
$router->get('product-size/delete', 'ProductsSizesController@delete');

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
