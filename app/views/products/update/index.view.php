
<?php require('app/views/master/header.view.php') ?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php require('app/views/master/nav.view.php') ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/products">List Products</a></li>
        <li class="breadcrumb-item active">Update product</li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Current product
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <nav class="nav flex-column nav-pills" id="myTab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Product Infomation</a>
                <a class="nav-item nav-link" id="nav-quantity-tab" data-toggle="tab" href="#nav-quantity" role="tab" aria-controls="nav-quantity" aria-selected="false">Quantity</a>
                <a class="nav-item nav-link" id="nav-upload-image-tab" data-toggle="tab" href="#nav-upload-image" role="tab" aria-controls="nav-upload-image" aria-selected="false">Upload image</a>
              </nav>
            </div>
            <div class="col-md-9">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                  <?php require('information.view.php') ?>
                </div>
                <div class="tab-pane fade" id="nav-quantity" role="tabpanel" aria-labelledby="nav-quantity-tab">
                <?php require('quantity.view.php') ?>
                </div>
                <div class="tab-pane fade" id="nav-upload-image" role="tabpanel" aria-labelledby="nav-upload-image-tab">
                <?php require('uploadImage.view.php') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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