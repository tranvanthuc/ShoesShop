
<?php
header('Access-Control-Allow-Origin: *'); 
?>

<?php

// login
$router->post('login', 'AuthenController@postLogin');

// register
$router->post('register', 'AuthenController@register');

// roles
$router->get('roles', 'RolesController@getAll');
$router->post('roles/role', 'RolesController@getById');




// users
$router->get('users', 'AuthenController@getAllUsers');
$router->post('users/user', 'AuthenController@getUserById');
$router->post('user/update-password', 'AuthenController@updatePassword');
$router->post('user/update-profile', 'AuthenController@updateProfile');
$router->post('user/delete', 'AuthenController@delete');

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

// ProductDetailsController
$router->get('product-details', 'ProductDetailsController@getAll');
$router->post('product-details/detail', 'ProductDetailsController@getById');
$router->post('product-detail/insert', 'ProductDetailsController@insert');
$router->post('product-detail/delete', 'ProductDetailsController@delete');
$router->post('product-detail/update', 'ProductDetailsController@update');
$router->post('product-details/category', 'ProductDetailsController@getByCategoryId');
$router->get('product-details/limit', 'ProductDetailsController@getLimit');

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


// feedback
$router->get('feedback', 'FeedbackController@getAll');
$router->post('feedback/id', 'FeedbackController@getById');
$router->post('feedback/insert', 'FeedbackController@insert');



$router->get('admin/products', 'PagesController@index');

$router->get('admin/login', 'AuthenController@getLogin');
$router->post('admin/login', 'AuthenController@postLogin');



// admin of categories
$router->get('admin/cates', 'CategoriesController@index');
$router->get('admin/cate/insert', 'CategoriesController@getInsert');
$router->get('admin/cate/update', 'CategoriesController@getUpdate');
$router->get('admin/cate/delete', 'CategoriesController@delete');

// ------------------------AMIND----------------------

// home pages
$router->get('', 'PagesController@dashboard');

// login
$router->get('admin/login', 'AuthenController@getLogin');
$router->post('admin/login', 'AuthenController@postLogin');

// logout
$router->get('admin/logout', 'AuthenController@logout');

// users management
$router->get('admin/users', 'UsersController@index');
// $router->get('user-detail', 'AuthenController@getUserById');

// products managements
$router->get('admin/products', 'ProductDetailsController@index');
$router->get('admin/product/update', 'ProductDetailsController@getUpdate');
$router->post('admin/product/update', 'ProductDetailsController@update');
$router->post('admin/product/quantity/update', 'ProductsController@update');

