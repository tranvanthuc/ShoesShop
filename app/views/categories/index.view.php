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
        <li class="breadcrumb-item active">Charts</li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Categories
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="/admin/cate/insert" class="btn btn-secondary fa fa-plus"></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <?php foreach ($cates[0] as $key => $value): ?>
                    <th><?=$key ?></th>
                  <?php endforeach?>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <?php foreach ($cates[0] as $key => $value): ?>
                    <th><?=$key ?></th>
                  <?php endforeach?>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cates as $cate): ?>
                  <tr>
                    <td><?=$cate->id ?></td>
                    <td><?=$cate->name ?></td>
                    <td><?=$cate->gender ?></td>
                    <td>
                      <a href="/admin/cate/update/?id=<?= $cate->id ?>" class="btn btn-primary fa fa-pencil-square-o"></a>
                      <button onclick="myFunction()" href="/admin/cate/delete/?id=<?= $cate->id ?>" class="btn btn-danger fa fa-trash-o"></button>
                    </td>
                  </tr>
                <?php endforeach?>
              </tbody>
            </table>
          </div>
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

