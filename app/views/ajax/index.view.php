<?php 
  require('app/views/master/header.view.php');

?>
<?php ?>
<script src="/public/myJs/functions.js"></script>
<script src="/public/myJs/cate/insert.js"></script>
<link rel="stylesheet" href="/public/myCss/style.css">


<body >
  <div>
    <?php   require('app/views/loading.view.php');?>
    <ul id="cates">
    </ul>
  </div>
  
  <div>
    <input type="text" name="name" id="name" placeholder="Enter name">
    <input type="text" name="gender" id="gender" placeholder="Enter gender">
    <button id="btnSubmit">Submit</button>
  </div>

</body>



<?php require('app/views/master/footer.view.php') ?>