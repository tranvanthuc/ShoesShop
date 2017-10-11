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
$router->post('user/update', 'AuthenController@update');
$router->post('user/update-password', 'AuthenController@updatePassword');
$router->post('user/update-profile', 'AuthenController@updateProfile');
$router->get('user/delete', 'AuthenController@delete');


// login
$router->post('login', 'AuthenController@login');

// register
$router->post('register', 'AuthenController@register');

