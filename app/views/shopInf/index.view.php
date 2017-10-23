
<?php require('app/views/master/header.view.php') ?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer " id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Shop Information</li>
    </ol>
    <!-- Content -->
    <div class="shop-info">
        <center><h3>Shop Information</h3></center>
        <form>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" value="<?= $shopInf[0]->name; ?>" />
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Description</label>
            <textarea class="form-control" rows="15" style="resize: none;" ><?= $shopInf[0]->description; ?></textarea>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" value=<?= $shopInf[0]->email; ?>>
        </div>
        <div class="form-group">
            <label >Phone</label>
            <input type="tel" class="form-control"  value=<?= $shopInf[0]->phone; ?>
        </div>
        <div class="form-group">
            <label >Address</label>
            <input type="text" class="form-control" value="<?= $shopInf[0]->address; ?>">
        </div>

        <button type="submit" class="btn btn-primary">
            <a href="<?= "shopInf/update/?id=".$shopInf[0]->id ?>" style="color:white;">Save</a>            
        </button>
        <button type="cancel" class="btn btn-primary">
            <a href="<?= "shopInf/update/?id=".$shopInf[0]->id ?>" style="color:white;">Detete</a>
        </button>
        </form>
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