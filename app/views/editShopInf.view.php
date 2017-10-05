<?php require 'partials/header.php'; ?>

<!-- update shop information action  -->
<h1>Submit your updation shop information</h1>

<form method="POST" action="/shopInf/update">
    <input type="hidden" name="id" value="<?= $shop->id ?>">
    <input type="text" name="name" value = "<?php echo $shop->name; ?>">
    <input type="text" name="description" value = "<?php echo $shop->description; ?>">
    <input type="text" name="address" value = "<?php echo $shop->address; ?>">
    <input type="text" name="phone" value = "<?php echo $shop->phone; ?>">
    <input type="text" name="email" value = "<?php echo $shop->email; ?>">
    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>