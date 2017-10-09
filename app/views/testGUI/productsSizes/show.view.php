<?php require('app/views/testGUI/partials/header.php'); ?>

<!-- update products_sizes action  -->
<h1>Submit your updation product_size</h1>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $productSize->id ?>">
    Product: <br/>
    <input type="text" name="productId" value = "<?= $productSize->product_id; ?>" ><br/>
    Size: <br/>
    <input type="text" name="sizeId" value = "<?= $productSize->size_id; ?>" ><br/>
</form>

<?php require('app/views/testGUI/partials/footer.php'); ?>