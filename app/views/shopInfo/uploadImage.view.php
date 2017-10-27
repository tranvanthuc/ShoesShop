
<?php require('app/views/master/header.view.php') ?>
<!-- <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->


<body class="fixed-nav sticky-footer " id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Shop Information</li>
        </ol>
        <!-- Content -->
        <div class="shop-info" >            
            <center><h3>Shop Information</h3></center>
            <div class="row">
            <div class="col-1 col-md-1"></div>
            <div class="col-10 col-md-10">
                <form action="" method="post" >
                    <button type="button" id="submit-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModalUpload">UpoadImage</button>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="myModalUpload" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update shop information</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input name="uploadedImage" type="file" value="Choose Image"><br /><br />
                        </div>
                        <div class="modal-footer">                            
                            <button  class="btn btn-primary" type= "submit"> UpoadImage </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                </div> 
                <div class="col-1 col-md-1"></div> 
            </div>  
        </div>    
    </div>
</div>
</body>

<?php require('app/views/master/footer.view.php') ?>

<script src="/public/js/shop-info.js"></script>

<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>