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

