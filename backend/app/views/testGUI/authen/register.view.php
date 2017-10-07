<?php require('app/views/testGUI/partials/header.php'); ?>

<script src="public/js/script.js"></script>

<h1>Register</h1>
<form action="/register" method="post">
  <div>
    <input type="text" placeholder="Enter username"
  name="username">
  </div>
  
  <div>
    <input type="password" id="password" placeholder="Enter password"
  name="password">
  </div>
  <div>
    <input type="password" placeholder="Enter confirm password"
  name="confirm_password" id="confirm_password" onkeyup="check_pass();">
    <span id="message"></span>
  </div>
  <input type="submit" id="submit" value="Submit" disabled>
</form>


<?php require('app/views/testGUI/partials/footer.php'); ?>
  