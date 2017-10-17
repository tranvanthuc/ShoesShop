
<?php
header('Access-Control-Allow-Origin: *'); 
?>

<?php

// home pages
$router->get('', 'PagesController@index');

// CategoryController
$router->get('cates', 'CategoriesController@getAll');
$router->get('cates/catalog', 'CategoriesController@getCategoriesByCatalog');
$router->post('cate/insert', 'CategoriesController@insert');
$router->post('cate/delete', 'CategoriesController@delete');
$router->post('cate/update', 'CategoriesController@update');
$router->post('cates/cate', 'CategoriesController@getById');
$router->post('cates/gender', 'CategoriesController@getByGender');


// ProductsController
$router->get('products', 'ProductsController@getAll');
$router->post('products/product', 'ProductsController@getById');
$router->post('product/insert', 'ProductsController@insert');
$router->post('product/update', 'ProductsController@update');
$router->post('product/delete', 'ProductsController@delete');
$router->post('product/all-info', 'ProductsController@getAllInfo');

// users
$router->get('users', 'AuthenController@getAllUsers');
$router->post('users/user', 'AuthenController@getUserById');
$router->post('user/update-password', 'AuthenController@updatePassword');
$router->post('user/update-profile', 'AuthenController@updateProfile');
$router->post('user/delete', 'AuthenController@delete');

// login
$router->post('login', 'AuthenController@login');

// register
$router->post('register', 'AuthenController@register');

// roles
$router->get('roles', 'RolesController@getAll');
$router->post('roles/role', 'RolesController@getById');

// ProductDetailsController
$router->get('product-details', 'ProductDetailsController@getAll');
$router->post('product-details/detail', 'ProductDetailsController@getById');
$router->post('product-detail/insert', 'ProductDetailsController@insert');
$router->post('product-detail/delete', 'ProductDetailsController@delete');
$router->post('product-detail/update', 'ProductDetailsController@update');
$router->post('product-details/category', 'ProductDetailsController@getByCategoryId');


// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shop-info', 'ShopInfController@getAll');

// //update shop information
$router->post('shop-info/update', 'ShopInfController@update');


// ----------------------------Order controller----------------//
//show list information of the shop
$router->get('orders', 'OrdersController@getAll');

//show list information of the shop
$router->post('orders/order', 'OrdersController@getByUserId');

//update shop information
$router->post('order/update', 'OrdersController@update');

//delete shop information
$router->post('order/delete', 'OrdersController@delete');

//insert shop information
$router->post('order/insert', 'OrdersController@insert');

// ----------------------------Order Detail controller----------------//
//show list information of the shop
$router->get('order-details', 'OrderDetailsController@getAll');

//show list information of the shop
$router->post('order-details/order-detail', 'OrderDetailsController@getByProductId');

//update shop information
$router->post('order-detail/update', 'OrderDetailsController@update');

//delete shop information
$router->post('order-detail/delete', 'OrderDetailsController@delete');

//insert shop information
$router->post('order-detail/insert', 'OrderDetailsController@insert');
