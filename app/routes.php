<?php

// pages controller
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

// todos contronller
// show todos list and insert todo
$router->get('todos', 'TodosController@index');
$router->post('todos', 'TodosController@insert');

// edit todo
$router->get('todos/edit','TodosController@getEditTodo');
$router->post('todos/edit','TodosController@postEditTodo');

// delete todo
$router->get('todos/delete', 'TodosController@getDeleteTodo');

// authen
$router->get('login', 'AuthenController@login');
$router->post('login', 'AuthenController@access');

// logout
$router->get('logout', 'AuthenController@logout');