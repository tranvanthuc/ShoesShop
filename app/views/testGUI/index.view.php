<?php require('app/views/testGUI/partials/header.php'); ?>

<?php 
  $user = $_SESSION['user'];
?>

<h1>Homepage</h1>
<h3>Hello <?= $user->first_name ?></h3>

<?php require('app/views/testGUI/partials/footer.php'); ?>
  