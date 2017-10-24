
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
            
            <div class="row">
            <div class="col-sm-6 ">
                <div class="card">
                <div class="card-block">
                    <h3 class="card-title">Order</h3>
                    <p class="card-text">Order ID: <?= $orders[0]->order_id ?></p>
                    <p class="card-text">Date/Time: <?= $orders[0]->date ?></p>
                    <p class="card-text">Total Fee: <?= $orders[0]->date ?></p>
                    <p class="card-text">Status: Done</p>
                    <a href="#" class="btn btn-primary">View List order</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-block">
                    <h3 class="card-title">Customer detail</h3>
                    <p class="card-text">Name: <?= $orders[0]->last_name." ".$orders[0]->first_name ?></p>
                    <p class="card-text">Email: <?= $orders[0]->email ?></p>
                    <p class="card-text">Phone: <?= $orders[0]->phone ?></p>
                    <p class="card-text">Address: <?= $orders[0]->address ?></p>
                    <a href="#" class="btn btn-primary">View list User</a>
                </div>
                </div>
            </div>
            </div><br />
            
            <div class="card mb-3 order">
                <div class="card-header">
                    <i class="fa fa-table"></i> Order Detail
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub-Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order) { ?>
                            <tr>
                                <td><?= $order->name ?></td>
                                <td><?= $order->size ?></td>
                                <td><?= $order->color ?></td>
                                <td><?= $order->quantity ?></td>
                                <td><?= $order->price ?></td>
                                <td><?= $order->price*$order->quantity ?></td>
                            </tr>
                            <?php } ?>
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