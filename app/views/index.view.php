<?php require('partials/header.php'); ?>
<?php 
  $user = $_SESSION['user'];
?>

<h1>Homepage</h1>

<p>Hello <?= $user->fullname ?></p>

<?php require('partials/footer.php'); ?>
  