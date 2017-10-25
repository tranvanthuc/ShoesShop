
<?php require('app/views/master/header.view.php') ?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">View list users</li>
    </ol>
    <!-- content -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List users
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <?php 
                $fields = ['ID', 'Name','Email', 'Gender', 'Role'];
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
                foreach($users as $user) :
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $user->first_name . ", " . $user->last_name; ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->gender == 1 ? "Male" : "Female" ?></td>
                <td><?= $user->role_id == 1 ? "Admin" : "Customer" ?></td>
              </tr>
                <?php endforeach; ?>
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

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>