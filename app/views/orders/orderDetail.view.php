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
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/admin/orders">Orders</a>
                </li>
                <li class="breadcrumb-item active">Order detail</li>
            </ol>
            <!-- Content -->
            <div class="row">
                <div class="col-sm-5 sub-card">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">Order</div>
                        </div>
                        <div class="card-body" style="background-color: white">
                            <div class="sub-field " style="color: black;">
                                <p class="card-text">Order ID:
                                    <?= $orderDetails[0]->order_id ?>
                                </p>
                                <p class="card-text">Date/Time:
                                    <?= $orderDetails[0]->date ?>
                                </p>
                                <p class="card-text">Total Fee:
                                    <?php $subTotal = 0;
                                        foreach($orderDetails as $orderDetail){
                                            $subTotal = $subTotal + $orderDetail->total;
                                        }
                                        echo "$ ".$subTotal;  
                                    ?>
                                </p>
                                <p class="card-text">Status: Done</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br />

                <div class="col-sm-5 sub-card">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="mr-5">Customer Detail</div>
                        </div>
                        <div></div>
                        <div class="card-body" style="background-color: white">
                            <div class="sub-field " style="color: black;">
                                <p class="card-text">Name:
                                    <?= $orderDetails[0]->last_name." ".$orderDetails[0]->first_name ?>
                                </p>
                                <p class="card-text">Email:
                                    <?= $orderDetails[0]->email ?>
                                </p>
                                <p class="card-text">Phone:
                                    <?= $orderDetails[0]->phone ?>
                                </p>
                                <p class="card-text">Address:
                                    <?= $orderDetails[0]->address ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <div class="card mb-3 order">
                <div class="card-header">
                    <i class="fa fa-table"></i> Order Detail Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orderDetails as $orderDetail) { ?>
                                <tr>
                                    <td>
                                        <?= $orderDetail->name ?>
                                    </td>
                                    <td>
                                        <?= $orderDetail->size ?>
                                    </td>
                                    <td>
                                        <?= $orderDetail->quantity ?>
                                    </td>
                                    <td>
                                        <?= $orderDetail->price ?>
                                    </td>
                                    <td>
                                        <?= $orderDetail->total ?>
                                    </td>
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

<script src="/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="/public/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/public/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/public/js/sb-admin-datatables.min.js"></script>