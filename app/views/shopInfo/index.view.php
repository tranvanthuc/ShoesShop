
<?php require('app/views/master/header.view.php') ?>
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<body class="fixed-nav sticky-footer " id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<script>
    function UpdateShopInf(href, e){
        var confirmUpdate = confirm("Do you want to update shop information ?");
        if(confirmUpdate) {
            window.location.href = href;
        } else {          
            window.location.reload(); 
            return false;
        }
    }
    // validate phone
    function validatephone(phone) 
    {
        var maintainplus = '';
        var numval = phone.value
        if ( numval.charAt(0)=='+' )
        {
            var maintainplus = '';
        }
        curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
        phone.value = maintainplus + curphonevar;
        var maintainplus = '';
        phone.focus;
    }

    // validate email
    function email_validate(email)
    {
        var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

        if(regMail.test(email) == false)
        {
        document.getElementById("status").innerHTML = "<span class='warning'>Email address is not valid yet.</span>";
        } else {
            document.getElementById("status").innerHTML = "";
        }
    }
</script>

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
    <div class="shop-info" >
        
        <center><h3>Shop Information</h3></center>
        <form method="POST" action="shopInfo/update">
            <input type="hidden" name="id" value="<?= $shopInf[0]->id ?>" class="txt-input">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" maxlength="100" 
                value="<?= $shopInf[0]->name; ?>" required/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="11" 
                maxlength="1500" style="resize: none;"><?= $shopInf[0]->description; ?></textarea>
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" class="form-control" name="email" value=<?= $shopInf[0]->email; ?> 
                onchange="email_validate(this.value);" required />
                <div class="status" id="status"></div>
            </div>
            <div class="form-group">
                <label >Phone</label>
                <input type="tel" class="form-control" name="phone" value=<?= $shopInf[0]->phone; ?> 
                onkeyup="validatephone(this)"  maxlength="11" required />
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" class="form-control" name="address" value="<?= $shopInf[0]->address; ?>" />
            </div>

            <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "admin/shopInfo/update"; 
            ?>
            <button type="submit" id="submit-btn" class="btn btn-primary" 
            onclick="return UpdateShopInf('<? $url ?>')" >
                Update  
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