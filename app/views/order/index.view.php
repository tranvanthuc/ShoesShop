
<?php require('app/views/master/header.view.php') ?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<link href="/public/css/order.css" rel="stylesheet">

<body class="fixed-nav sticky-footer " id="page-top">
<?php require('app/views/master/nav.view.php') ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Order management</li>
            </ol>
            <!-- Content -->
            <div class="card mb-3 order">
                <div class="card-header">
                    <i class="fa fa-table"></i> Order Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Order Fee</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Order Fee</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                foreach($orders as $order) {
                            ?>
                            <tr>
                                <td><?= $order->order_id ?></td>
                                <td><?= $order->last_name." ".$order->first_name?></td>
                                <td><?= $order->email?></td>
                                <td><?= $order->date?></td>
                                <td><?= $order->totalFee?></td>
                                <td>
                                    <ul id ="action-btn" >
                                        <li >
                                            <a href="<?= "orders/order-detail/?id=".$order->order_id ?>" id ="btn-update">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;
                                            </a>
                                        </li>
                                        <li style="float:left;">
                                            <a href="" id ="btn-update" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete order</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to delete it?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type= "submit">
                                                            <a href="<?= "orders/order/delete/?id=".$order->order_id ?>" style="color:black;">OK </a>
                                                        </button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick='window.location.reload();' >Close</button>
                                                    </div>
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

<?php require('app/views/master/footer.view.php') ?>

<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>