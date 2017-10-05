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

// // hosting sql
// return [
//   'database' => [
//     'name' => 'id3113257_neolab',
//     'username' => 'id3113257_root',
//     'password' => 'thuc123',
//     'connection' => 'mysql:host=localhost',
//     'options' => [
//       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//     ]
//   ]
// ];

?>
