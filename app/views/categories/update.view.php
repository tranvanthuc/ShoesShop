<?php require('app/views/master/header.view.php') ?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require('app/views/master/nav.view.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin/cates">Categories Management</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/cate/update">Update</a>
        </li>
        <li class="breadcrumb-item active">Charts</li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Update Table
        </div>
        <div class="card-body">
          <h2>Category #<?= $_GET['id'];  ?></h2>
          <form method="POST" action="/cate/update">
            <input type="text" name="id" class="form-control" value="<?= $cate[0]->id; ?>" hidden>

            <div class="form-group">
              <input type="text" name="name" class="form-control" value="<?= $cate[0]->name; ?>" required>
            </div>
            <div class="form-group">
              <input type="text" name="gender" class="form-control" value="<?= $cate[0]->gender; ?>" required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">UPDATE</button>
            </div>
          </form>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error ?>
            </div>
          <?php endif; ?>

        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
</body>



<?php require('app/views/master/footer.view.php') ?>

<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>