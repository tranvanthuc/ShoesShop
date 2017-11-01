<?php require('app/views/master/header.view.php') ?>
<link href="/public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
            <li class="breadcrumb-item active">User management</li>
            </ol>
            <!-- Content -->
            <div class="card mb-3 order">
            <div class="card-header">
                <i class="fa fa-table"></i> User Table
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>gender</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            foreach($users as $user) {
                        ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->last_name." ".$user->first_name?></td>
                            <td><?= $user->email?></td>
                            <td>
                                <?php if($user->gender == 0){
                                    echo "Female";                                
                                } else {
                                    echo "Male";
                                } 
                                ?>
                            </td>
                            <td>
                                <ul id ="action-btn" >
                                    <li>
                                        <a href="<?= "user-demos/user-detail/?id=".$user->id ?>" class="btn btn-primary btn-sm" >
                                            <i class="fa fa-eye view-icon" aria-hidden="true"></i>
                                        </a>&thinsp;
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#myModal" 
                                            class="btn btn-danger btn-sm" data-id="<?= $order->order_id;?>">
                                            <i class="fa fa-trash-o view-icon" aria-hidden="true"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog" tabindex="-1"  
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete order</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/orders/order/delete" method="post">
                                                        <input type="hidden" class="form-control" id="id" name="id">
                                                        <p>Do you want to delete it?</p>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <input type="submit" class="btn btn-danger" value="Yes">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
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