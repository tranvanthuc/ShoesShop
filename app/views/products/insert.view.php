<?php require('app/views/master/header.view.php') ?>
<script src="/public/ckeditor/ckeditor.js"></script>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require('app/views/master/nav.view.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/products">List Products</a>
        </li>
        <li class="breadcrumb-item active">Add product</li>
      </ol>
      <!-- content -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> New product
        </div>
        <div class="card-body">
          <form action="/admin/product/insert" method="post">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category_id">
                    <?php foreach($cates as $cate) : ?>
                      <option value=<?= $cate->id ?>>
                        <?= $cate->name . " - " . $cate->gender ?> 
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price">
                </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control ckeditor" rows="5" name="description"
              ></textarea>
            </div>
            
            <div class="row form-group">
              <div class="col-md-3">
                <input type="submit" value="Save" class="btn btn-primary form-control">
              </div>
              
              <div class="col-md-3">
                <a href="/admin/products"class="btn btn-secondary form-control" >Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>



<?php require('app/views/master/footer.view.php') ?>