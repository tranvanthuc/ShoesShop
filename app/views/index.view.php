<?php require('partials/header.php'); ?>
<?php 
  $user = $_SESSION['user'];
?>

<h1>Homopage</h1>
<h3>Hello <?= $user->first_name ?></h3>

<?php require('partials/footer.php'); ?>
  