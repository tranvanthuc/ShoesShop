<?php require('app/views/partials/header.php'); ?>
  <h1>Login page</h1>

  <form action="login" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
  </form>

<?php require('app/views/partials/footer.php'); ?>