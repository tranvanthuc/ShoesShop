<?php require('app/views/master/header.view.php') ?>
<?php ?>
<link rel="stylesheet" href="/public/pace/themes/blue/pace-theme-loading-bar.css">
<script src="/public/pace/pace.min.js"></script>
<script src="/public/myJs/functions.js"></script>

<link rel="stylesheet" href="/public/myCss/style.css">


<body >
  <div id="content">
    <input type="text" name="name" id="name" placeholder="Enter name">
    <input type="text" name="gender" id="gender" placeholder="Enter gender">
    <button id="btnSubmit">Submit</button>
    <button id="btnDelete">Delete</button>
    <div id="error"></div>
  </div>
  
</body>


<script src="/public/myJs/cate/update.js"></script>
<script src="/public/myJs/cate/delete.js"></script>
<script src="/public/myJs/showContent.js"></script>

<?php require('app/views/master/footer.view.php') ?>