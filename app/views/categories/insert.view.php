<?php require 'app/views/master/header.view.php'?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require 'app/views/master/nav.view.php'?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin/cates">List Categories</a>
        </li>
        <li class="breadcrumb-item">
          <span>Add Category</span>
        </li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> New Category
        </div>
        <div class="card-body">
          <form method="POST" action="/cate/insert">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="form-group">
              <select class="form-control" name="gender" id="sel1">
                <option value="male">male</option>
                <option value="female">female</option>
              </select>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">ADD</button>
            </div>
          </form>
          <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error ?>
            </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</body>



<?php require 'app/views/master/footer.view.php'?>

<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>s
