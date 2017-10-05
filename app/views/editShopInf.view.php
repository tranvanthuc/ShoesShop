<?php require 'partials/header.php'; ?>

<!-- update shop information action  -->
<h1>Submit your updation shop information</h1>

<form method="POST" action="/shopInf/update">
    <input type="hidden" name="id" value="<?= $shopInf->id ?>">
    Name: <br/>
    <input type="text" name="name" value = "<?php echo $shopInf->name; ?>"><br/>
    Description: <br/>
    <input type="text" name="description" value = "<?php echo $shopInf->description; ?>"><br/>
    Addres: <br/>
    <input type="text" name="address" value = "<?php echo $shopInf->address; ?>"><br/>
    Phone: <br/>
    <input type="text" name="phone" value = "<?php echo $shopInf->phone; ?>"><br/>
    Email: <br/>    
    <input type="text" name="email" value = "<?php echo $shopInf->email; ?>"><br/>
    <br/><button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>