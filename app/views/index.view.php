<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Server</title>
</head>
<body>
  <?php 
    session_start();
    $user = $_SESSION['user'];
  ?>
  <h1>Welcome to Server</h1>
  <h3>All members</h3>
  <ul>
    <li>Tran Van Thuc</li>
    <li>Nguyen Hong Doan Huy</li>
    <li>Thai Thi Hong Minh</li>
    <li>Le Thi Thuy Dung</li>
  </ul>
  <h3><?= $user->first_name ?></h3>
</body>
</html>