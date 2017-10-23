
<?php
header('Access-Control-Allow-Origin: *'); 
?>

<?php

// login
$router->post('login', 'AuthenController@login');

// register
$router->post('register', 'AuthenController@register');

// roles
$router->get('roles', 'RolesController@getAll');
$router->post('roles/role', 'RolesController@getById');


// home pages
$router->get('', 'PagesController@index');

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

//shop_information Controller
$router->get('shop-info', 'ShopInfController@getAll');
$router->post('shop-info/update', 'ShopInfController@update');


//Order Controller
$router->get('orders', 'OrdersController@getAll');
$router->post('orders/order', 'OrdersController@getByUserId');
$router->post('order/update', 'OrdersController@update');
$router->post('order/delete', 'OrdersController@delete');
$router->post('order/insert', 'OrdersController@insert');

//Order Detail Controller
$router->get('order-details', 'OrderDetailsController@getAll');
$router->post('order-details/order-detail', 'OrderDetailsController@getByProductId');
$router->post('order-detail/update', 'OrderDetailsController@update');
$router->post('order-detail/delete', 'OrderDetailsController@delete');


// feedback
$router->get('feedback', 'FeedbackController@getAll');
$router->post('feedback/id', 'FeedbackController@getById');
$router->post('feedback/insert', 'FeedbackController@insert');