<?php require('app/views/testGUI/partials/header.php'); ?>

<!-- update shoe size action  -->
<h1>Submit your updation size</h1>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $size->id ?>">
    size: <br/>
    <input type="text" name="size" value = "<?= $size->size; ?>" >
    <button type="submit">Submit</button>
</form>

<?php require('app/views/testGUI/partials/footer.php'); ?>