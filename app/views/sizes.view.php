<?php require('partials/header.php'); ?>
<h1>All shoe sizes</h1>

<!-- View all shoe sizes  -->
<table style="width: 25%;">
    <!-- render all shoe sizes -->
    <tr>
        <td>ID</td>
        <td>Size</td>
        <td>Action</td>
    </tr>

    <?php foreach($sizes as $data): ?> 
        <tr>
            <td><?= $id = $data->id; ?></td>   
            <td><?= $data->size; ?></td>

            <!-- delete shoe size action  -->
            <td>
                <form action = "/sizes/delete" method = "GET">
                    <input name = "id" type = "hidden" value="<?php echo $id; ?>">
                    <input type = "submit" value = "Delete">
                </form>
            </td>
            <!-- update shoe size action  -->
            <td>
                <form action = "/sizes/update" method = "GET">
                    <input name = "id" type = "hidden" value="<?php echo $id; ?>">
                    <input type = "submit" value = "Update">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table><br />

<!-- insert shoe size action  -->
<h1>Submit your shop information</h1>

<form method="POST" action="/sizes">
    size: <br/>
    <input type="text" name="size" >
    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>

