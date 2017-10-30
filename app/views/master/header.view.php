<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="/public/css/sb-admin.min.css" rel="stylesheet">
  <link href="/public/css/style.css" rel="stylesheet">
  <script src="/public/vendor/jquery/jquery.min.js"></script>
</head>
<?php 
  session_start();
  use utils\Functions;

  if(!Functions::blockPage() && !$_SESSION['user'])
    redirect('admin/login');
  else if(!Functions::blockPage())
    $user = $_SESSION['user'];
?>