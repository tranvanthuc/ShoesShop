<?php

// pages controller
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@index');
$router->post('todos', 'TodosController@store'); // post of insert

// edit todo
$router->get('todos/edit','TodosController@getUpdate');
$router->post('todos/edit','TodosController@postUpdate');

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
$router->get('shopInf', 'ShopInfController@index');

//return to create shop information page
$router->get('shopInf/create', 'ShopInfController@create');

//return to show shop information page
$router->get('shopInf/show', 'ShopInfController@show');

//insert shop information
$router->post('shopInf', 'ShopInfController@store');

// //update shop information
$router->get('shopInf/update', 'ShopInfController@getupdate');
$router->post('shopInf/update', 'ShopInfController@postupdate');

//delete shop information
$router->get('shopInf/shop/delete', 'ShopInfController@delete');

// ----------------------------Sizes controller----------------//
//show list Sizes of the shop
$router->get('sizes', 'SizesController@index');

//insert new size
$router->post('sizes', 'SizesController@store');

//show list Sizes of the shop
$router->get('sizes/create', 'SizesController@create');

//show list Sizes of the shop
$router->get('sizes/show', 'SizesController@show');

// //update size by id
$router->get('sizes/size/update', 'SizesController@getupdate');
$router->post('sizes/size/update', 'SizesController@postupdate');

//delete size
$router->get('sizes/index/size/delete', 'SizesController@delete');

// ----------------------------ProductsSizes controller----------------//
//show list ProductsSizes of the shop
$router->get('productsSizes', 'ProductsSizesController@index');

//insert new ProductsSizes
$router->post('productsSizes', 'ProductsSizesController@store');

//return to show ProductsSizes page
$router->get('productsSizes/create', 'ProductsSizesController@create');

//return to show ProductsSizes page
$router->get('productsSizes/show', 'ProductsSizesController@show');

// //update size by id
$router->get('productsSizes/productSize/update', 'ProductsSizesController@getupdate');
$router->post('productsSizes/productSize/update', 'ProductsSizesController@postupdate');

//delete size
$router->get('productsSizes/productSize/delete', 'ProductsSizesController@delete');


