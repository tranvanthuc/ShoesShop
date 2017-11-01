<?php require('app/views/master/header.view.php') ?>
<?php 
  if (isset($_SESSION['user'])) {
    redirect('admin/dashboard');
  }
?>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="/admin/user-demos/login" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control"  type="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control"  type="password" name="password" placeholder="Password">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" >
        </form>
        <?php if(isset($_SESSION['error'] )) { ?>
          <div class="alert alert-warning" role="alert">
            <strong>Error!</strong> <?= $_SESSION['error'] ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  

<?php require('app/views/master/footer.view.php') ?>