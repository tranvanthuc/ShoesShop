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










//------------------Test -------------- 

// test json 
$router->get('json', 'AuthenController@testJson'); 

// pages controller
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@getAll');
$router->post('todos', 'TodosController@insert'); // post of insert

// edit todo
$router->get('todos/edit','TodosController@getById');
$router->post('todos/edit','TodosController@update');

// delete todo
$router->get('todos/delete', 'TodosController@delete');