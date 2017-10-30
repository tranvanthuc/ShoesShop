<?php require('app/views/master/header.view.php') ?>
<!-- <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
<link href="/public/css/order.css" rel="stylesheet">

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
            <div class="shop-info">

                <center>
                    <h3>Shop Information</h3>
                    <?php if(isset($_GET['msg'])): ?>                        
                        <div class="alert alert-danger" style="width:30%;" role="alert">
                        <?php 
                            $errors = array (
                                0 => "Upload image success",
                                1 => "File is not a image",
                                2 => "File is exist",
                                3 => "File is too large",
                                4 => "Only jpg, png, jpeg, gif are allowed",
                                5 => "Error when uploading your file"                                
                            );                            
                            
                            if (isset($_GET['msg'])) {
                                $error_id = isset($_GET['msg']);
                                switch ($error_id) {
                                    case 0: echo $errors[0];
                                        break;
                                    case 1: echo $errors[1];
                                        break;
                                    case 2: echo $errors[2];
                                        break;
                                    case 3: echo $errors[3];
                                        break;
                                    case 4: echo $errors[4];
                                        break;
                                    default: echo $errors[5];
                                }
                            }
                        ?>
                        </div>
                    <?php endif;?>
                    <button class="btn btn-success" style="width:30%;" data-toggle="modal" data-target="#uploadModal">Update image</button>
                </center>
                <div class="row">
                    <div class="col-1 col-md-1"></div>
                    <div class="col-10 col-md-10">
                        <form method="POST" action="shop-info/update" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $shopInf[0]->id ?>" class="txt-input">
                            <center><img id="shop-img"src="/public/uploads/<?= $shopInf[0]->image ?>" alt="Shop information image" ></center>
                            <div class="form-group"><br/>
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" maxlength="100" value="<?= $shopInf[0]->name; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="11" maxlength="1500" style="resize: none;"><?= $shopInf[0]->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" 
                                value="<?= $shopInf[0]->email; ?>" onchange="email_validate(this.value);" required />
                                <div class="status" id="status"></div>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" class="form-control" name="phone" 
                                value="<?= $shopInf[0]->phone; ?>" onkeyup="validatephone(this)" maxlength="11" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="<?= $shopInf[0]->address; ?>" />
                            </div>

                            <button type="button" id="submit-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update shop information</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to change it?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit"> Update </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick='window.location.reload();'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-1 col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require('app/views/shopInfo/uploadImage.view.php') ?>

<?php require('app/views/master/footer.view.php') ?>

<script src="/public/js/shop-info.js"></script>

<!-- <script src="/vendor/datatables/jquery.dataTables.js"></script> -->
<!-- <script src="/vendor/datatables/dataTables.bootstrap4.js"></script> -->
<!-- Custom scripts for all pages-->
<!-- <script src="/public/js/sb-admin.min.js"></script> -->
<!-- Custom scripts for this page-->
<!-- <script src="/public/js/sb-admin-datatables.min.js"></script> -->