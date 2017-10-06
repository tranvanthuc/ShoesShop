<?php require('partials/header.php'); ?>
  
<h1>Edit todo</h1>
<form action="/todos/edit" method="post">
    <input type="hidden" name="id" value="<?= $todo->id ?>">
    <input type="text" placeholder="Enter description"
    name="description"
    value="<?= $todo->description; ?>"
    >
    <input id="checkbox" type="checkbox" name="completed" 
    <?= $todo->completed ? "checked" : "" ?>
    >
    <input type="submit" value="Submit">
</form>
<script>

</script>
<?php require('partials/footer.php'); ?>
  