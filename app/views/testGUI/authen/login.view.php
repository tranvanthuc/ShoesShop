<?php require('app/views/testGUI/partials/header.php'); ?>

  <h1>Login page</h1>

  <form action="login" method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
  </form>

<?php require('app/views/testGUI/partials/footer.php'); ?>