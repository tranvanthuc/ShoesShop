
<?php require('app/views/master/header.view.php') ?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require('app/views/master/nav.view.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
         <a href="/">Dashboard</a>
       </li>
       <li class="breadcrumb-item active">Products management</li>
     </ol>
     <!-- content -->
     <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List Products
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead >
              <tr>
                <?php 
                $fields = ['ID', 'Name','Price', 'Created_at', 'Action'];
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
              foreach($proDetails as $product) :
                ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $product->name ?></td>
                  <td><?= $product->price ?></td>
                  <td><?= $product->created_at ?></td>
                  <td>
                    <a href=<?= "/admin/product/update?id=" . $product->id ?> class="btn btn-primary fa fa-pencil-square-o"></a>
                    &nbsp;
                    <a href="#" class="btn btn-danger fa fa-trash-o" 
                    data-toggle="modal" data-target="#deleteModal" 
                    data-id="<?= $product->id; ?>"
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



<?php require('modalDelete.view.php') ?>
<?php require('app/views/master/footer.view.php') ?>

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>