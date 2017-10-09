<?php require('app/views/testGUI/partials/header.php'); ?>

<h1>All products_sizes</h1>
<script>
  function deleteProductsSizes(href, name){
    var confirmDelete = confirm("Do you want to delete  product_size '" + name+ "' ?");
    if(confirmDelete) {
      window.location.href = href;
    }
  }
</script>
<style>
    #btn-update {
        text-decoration: none;
    }
</style>


<!-- View all products_sizes -->
<table style="width: 25%;">
    <!-- render all products_sizes -->
    <tr>
        <td>ID</td>
        <td>Product ID</td>
        <td>Size ID</td>
        <td></td>
        <td>Action</td>
    </tr>

    <?php foreach($productsSizes as $data): ?> 
        <tr>
            <?php 
                $productId = $data->product_id;
                $sizeId = $data->size_id; 
            ?>  
            <td><?= $id = $data->id; ?></td>   
            <td><?= $productId = $data->product_id; ?></td>
            <td><?= $sizeId = $data->size_id; ?></td>

            <!-- delete products_sizes action  -->
            <td>
                <?php $deleteUrl = "http://" . $_SERVER['HTTP_HOST'] . "/productsSizes/productSize/delete/?id={$data->id}";?>
                <button onclick="deleteProductsSizes('<?= $deleteUrl ?>', '<?= $data->product_id ?>')">Delete</button>            
            </td>
            <!-- update shoe size action  -->
            <td>
            <button ><a href="<?= "productsSizes/productSize/update/?id=".$data->id ?>" id ="btn-update">Update</a></button >        
            </td>
        </tr>
    <?php endforeach; ?>
</table><br />

<!-- insert shoe size action  -->
<h1>Submit your shop information</h1>

<form method="POST" action="/productsSizes">
    Product: <br/>
    <input type="text" name="productId" ><br />
    Size: <br/>
    <input type="text" name="sizeId" ><br /><br />
    <button type="submit">Submit</button>
</form>

<?php require('app/views/testGUI/partials/footer.php'); ?>

