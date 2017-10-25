<?php require 'app/views/master/header.view.php'?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

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
          <span>Update Category</span>
        </li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Current Category
        </div>
        <div class="card-body">
          <h2>Category #<?=$cate[0]->id?></h2>
          <form method="POST" action="/cate/update">
            <input type="text" name="id" class="form-control" value="<?=$cate[0]->id;?>" hidden>

            <div class="form-group">
              <input type="text" name="name" class="form-control" value="<?=$cate[0]->name;?>" required>
            </div>
            <div class="form-group">
              <select class="form-control" name="gender" id="sel1">
                <option selected="selected"><?=$cate[0]->gender?></option>
                <option value="<?=$cate[0]->gender == 'female' ? 'male' : 'female'?>">
                    <?=$cate[0]->gender == 'female' ? 'male' : 'female'?>
                </option>
              </select>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">UPDATE</button>
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

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>
