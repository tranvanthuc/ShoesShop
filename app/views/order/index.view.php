
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
                                        <li>
                                            <a href="<?= "orders/order-detail/?id=".$order->order_id ?>" class="btn btn-primary btn-sm" >
                                                <i class="fa fa-eye view-icon" aria-hidden="true"></i></i>
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
                                                    <script>
                                                        $('#myModal').on('show.bs.modal', function (event) {
                                                        var button = $(event.relatedTarget) 
                                                        var id = button.data('id');
                                                        $('#id').val(id);
                                                    })
                                                    </script>
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