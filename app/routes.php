<?php

// home pages
$router->get('', 'PagesController@index');

// CategoryController
$router->get('cates', 'CategoriesController@getAll');
$router->post('cate/insert', 'CategoriesController@insert');
$router->get('cate/delete', 'CategoriesController@delete');
$router->post('cate/update', 'CategoriesController@update');
$router->get('cates/cate', 'CategoriesController@getById');

// ProductsController
$router->get('products', 'ProductsController@getAll');
$router->get('products/product', 'ProductsController@getById');
$router->post('product/insert', 'ProductsController@insert');
$router->get('product/delete', 'ProductsController@delete');
$router->post('product/update', 'ProductsController@update');



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

// roles
$router->get('roles', 'RolesController@getAll');
$router->get('roles/role', 'RolesController@getById');


// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shop-inf', 'ShopInfController@getAll');

// //update shop information
$router->post('shop-inf/update', 'ShopInfController@update');

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
