<?php 
// mysql
return [
  'database' => [
    'name' => 'todos',
    'username' => 'root',
    'password' => '123',
    'connection' => 'mysql:host=127.0.0.1',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];

?>
