
<?php require('app/views/master/header.view.php') ?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Feedback management</li>
    </ol>
    <!-- content -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List Feedback
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead >
              <tr>
                <?php 
                $fields = ['ID', 'Email','Name', 'Created_at', 'Action'];
                foreach($fields as $field) :
                ?>
                <th><?= $field ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <?php foreach($fields as $field) : ?>
                <th><?= $field ?></th>
                <?php endforeach; ?>
              </tr>
            </tfoot>
            <tbody>
              <?php
                $i = 1;
                foreach($feedback as $item) :
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->created_at ?></td>
                <td>
                  <a href=<?= "/admin/feedback/view?id=" . $item->id ?> class="btn btn-primary fa fa-eye"></a>
                  &nbsp;
                </td>
              </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>


<?php require('app/views/master/footer.view.php') ?>

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>