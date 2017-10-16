
<?php
header('Access-Control-Allow-Origin: *'); 
?>

<?php

// home pages
$router->get('', 'PagesController@index');

// CategoryController
$router->get('cates', 'CategoriesController@getAll');
$router->post('cate/insert', 'CategoriesController@insert');
$router->post('cate/delete', 'CategoriesController@delete');
$router->post('cate/update', 'CategoriesController@update');
$router->post('cates/cate', 'CategoriesController@getById');

// ProductsController
$router->get('products', 'ProductsController@getAll');
$router->post('products/product', 'ProductsController@getById');
$router->post('product/insert', 'ProductsController@insert');
$router->post('product/update', 'ProductsController@update');
$router->post('product/delete', 'ProductsController@delete');

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


// ----------------------------shop_information controller----------------//
//show list information of the shop
$router->get('shop-inf', 'ShopInfController@getAll');

// //update shop information
$router->post('shop-inf/update', 'ShopInfController@update');
