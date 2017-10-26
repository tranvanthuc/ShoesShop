<?php require 'app/views/master/header.view.php' ?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require 'app/views/master/nav.view.php' ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">Categories Management</li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> List Categories
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <?php foreach ($cates[0] as $key => $value): ?>
                    <th><?=$key?></th>
                  <?php endforeach?>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <?php foreach ($cates[0] as $key => $value): ?>
                    <th><?=$key?></th>
                  <?php endforeach?>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cates as $key => $cate): ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$cate->name?></td>
                    <td><?=$cate->gender?></td>
                    <td>
                      <a href="/admin/cate/update/?id=<?=$cate->id?>" class="btn btn-primary fa fa-pencil-square-o"></a>
                      <a href="#" class="btn btn-danger fa fa-trash-o"
                      data-toggle="modal" data-target="#myModal"
                      data-id="<?=$cate->id;?>"
                      >
                    </td>
                  </tr>
                <?php endforeach?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>



<?php require 'app/views/master/footer.view.php'?>
<?php require 'modal.view.php'?>

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>

