<?php require 'partials/header.php'; ?>

<!-- View all shop informations  -->
<style>
    .txt-input {
        width: 38.5%;
    }
    #btn-update {
        text-decoration: none;
    }
</style>
<script>
  function deleteShopInf(href, shopName){
    var confirmDelete = confirm("Do you want to delete '" + shopName+ "' ?");
    if(confirmDelete) {
      window.location.href = href;
    }
  }
</script>
<ul style="list-style-type:none">
    <!-- render all shop information in the information table -->
    <?php foreach($shopInf as $shop): ?> 
        <h1>Shop Information</h1>
        <li>ID: <?= $id = $shop->id; ?></li> <br />           
        <li>name: <?= $shop->name; ?></li> <br />
        <li>description: <?= $shop->description; ?></li><br />
        <li>address: <?= $shop->address; ?></li><br />
        <li>phone: <?= $shop->phone; ?></li><br />
        <li>email: <?= $shop->email; ?></li><br />

        <!-- delete shop informaton action  -->
        <li>
            <?php $deleteUrl = "http://" . $_SERVER['HTTP_HOST'] . "/shopInf/delete/?id={$shop->id}"; ?>
            <button onclick="deleteShopInf('<?= $deleteUrl ?>', '<?= $shop->name ?>')">Delete</button>            
        </li><br />

        <!-- update shop information action  -->
        <li>
        <button ><a href="<?= "shopInf/update/?id=".$shop->id ?>" id ="btn-update">Update</a></button>
        </li><br />
        
    <?php endforeach; ?>
</ul><br />

<!-- insert shop information action  -->
<h1>Submit your shop information</h1>

<form method="POST" action="/shopInf">
    Name: <br/>
    <input type="text" name="name" class="txt-input"><br/><br/>
    Description: <br/>
    <textarea name="description" cols="59" rows="10" ></textarea><br/><br/>
    Address: <br/>
    <input type="text" name="address" class="txt-input"><br/><br/>
    Phone: <br/>
    <input type="text" name="phone" class="txt-input"><br/><br/>
    Email: <br/>    
    <input type="text" name="email" class="txt-input"><br/><br/>
    <br/><button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>