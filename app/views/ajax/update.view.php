<?php require('app/views/master/header.view.php') ?>
<?php ?>
<link rel="stylesheet" href="/public/pace/themes/blue/pace-theme-loading-bar.css">
<script src="/public/pace/pace.min.js"></script>
<script src="/public/myJs/functions.js"></script>
<script src="/public/myJs/cate/update.js"></script>
<script src="/public/myJs/cate/delete.js"></script>


<body >
  <div>
    <input type="text" name="name" id="name" placeholder="Enter name">
    <input type="text" name="gender" id="gender" placeholder="Enter gender">
    <button id="btnSubmit">Submit</button>
    <button id="btnDelete">Delete</button>
  </div>

</body>



<?php require('app/views/master/footer.view.php') ?>