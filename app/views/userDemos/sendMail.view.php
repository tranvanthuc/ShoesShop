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
            <div class="card mb-3 order">

            <form method="post" action="/admin/send-mail">
                <?php 
                    if(!$_SESSION['user']){
                        redirect('admin/login');
                    }
                ?>
                <input type="hidden" class="form-control" id="user_name" name="user_name" value=<?= $_SESSION['user']->id?> >     
                <input type="hidden" class="form-control" id="user_email" name="email" value=<?= $_SESSION['user']->email?>>     
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input class="form-control"  type="text" name="title" placeholder="Enter title">
                </div>       
                <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <input class="form-control"  type="text" name="content" placeholder="Enter content of email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">cc Mail</label>
                    <input class="form-control"  type="email" name="ccmail" placeholder="cc mail">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="submit" >
            </form>

            </div>
        </div>
    </div>
</body>

<?php require('app/views/shopInfo/uploadImage.view.php') ?>

<?php require('app/views/master/footer.view.php') ?>

<script src="/public/js/shop-info.js"></script>