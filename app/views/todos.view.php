<?php require('partials/header.php'); ?>
<h1>All todos</h1>
<script>
  function deleteTodo(href, todoName){
    var confirmDelete = confirm("Do you want to delete '" + todoName+ "' ?");
    if(confirmDelete) {
      window.location.href = href;
    }
  }
</script>
<ul>

<?php
  foreach($todos as  $todo) :
    
    $deleteUrl = "http://". $_SERVER['HTTP_HOST']. "/todos/delete/?id={$todo->id}";
?>
  <!-- $todo->completed ? "" -->
  <li >
  
    <a href="<?= "todos/edit/?id=".$todo->id ?>">
    <?php if($todo->completed) { ?>
      <strike><?= $todo->description ?></strike>
    <?php } else {?>
    
      <?= $todo->description ?>
    <?php } ?>
    </a>
    <button onclick="deleteTodo('<?= $deleteUrl ?>', '<?= $todo->description ?>')">X</button>
  </li>
 
  <?php endforeach; ?>
</ul>

<form action="/todos" method="POST">
  <input type="text" name="description">
  <input type="submit" value="Submit">
</form>




<?php require('partials/footer.php'); ?>
  