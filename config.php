<?php 
// mysql

return [
  'database' => [
    'name' => 'shoesshop',
    'username' => 'shoesshop',
    'password' => 'thuc123*',
    'connection' => 'mysql:host=mysql6.gear.host',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];

