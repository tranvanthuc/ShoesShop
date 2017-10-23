<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <h3>Shop Information</h3>
    <div class="container">
    <ul style="list-style-type:none">
    <!-- render all shop information in the information table -->
        <?php foreach($shopInf as $shop): ?> 
            <li>ID: <?= $id = $shop->id; ?></li> <br />           
            <li>name: <?= $shop->name; ?></li> <br />
            <li>description: <?= $shop->description; ?></li><br />
            <li>address: <?= $shop->address; ?></li><br />
            <li>phone: <?= $shop->phone; ?></li><br />
            <li>email: <?= $shop->email; ?></li><br />

            <!-- update shop information action  -->
            <li>
            <button ><a href="<?= "shopInf/update/?id=".$shop->id ?>" id ="btn-update">Update</a></button>
            </li><br />
            <li>
            <button ><a href="<?= "shopInf/show/?id=".$shop->id ?>" id ="btn-update">Show</a></button>
            </li><br />
            
        <?php endforeach; ?>
    </ul><br />
    
    </div>
</body>

</html>