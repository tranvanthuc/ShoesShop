<?php require('app/views/testGUI/partials/header.php'); ?>

<h1>All shoe sizes</h1>
<script>
  function deleteSize(href, name){
    var confirmDelete = confirm("Do you want to delete  size '" + name+ "' ?");
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
            <td><?= $size = $data->size; ?></td>

            <!-- delete shoe size action  -->
            <td>
                <?php $deleteUrl = "http://" . $_SERVER['HTTP_HOST'] . "/sizes/index/size/delete/?id={$data->id}";?>
                <button onclick="deleteSize('<?= $deleteUrl ?>', '<?= $data->size ?>')">Delete</button>            
            </td>
            <!-- update shoe size action  -->
            <td>
            <button ><a href="<?= "sizes/size/update/?id=".$data->id ?>" id ="btn-update">Update</a></button >        
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

<?php require('app/views/testGUI/partials/footer.php'); ?>

