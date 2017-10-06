<?php require 'partials/header.php'; ?>

<!-- update shoe size action  -->
<h1>Submit your updation size</h1>

<form method="POST" action="/sizes/update">
    <input type="hidden" name="id" value="<?= $size->id ?>">
    size: <br/>
    <input type="text" name="size" value = "<?= $size->size; ?>" >
    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>