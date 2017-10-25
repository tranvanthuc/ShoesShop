
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
                                <td><ul style=" list-style-type: none; margin: 0;padding: 0;">
                                    <li style="float:left;">
                                        <a href="<?= "orders/order-detail/?id=".$order->order_id ?>" id ="btn-update">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;
                                        </a>
                                    </li>
                                    <li style="float:left;"><i class="fa fa-trash-o" aria-hidden="true"></i></li>
                                </ul></td>
                            </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>      
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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