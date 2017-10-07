<?php require('app/views/testGUI/partials/header.php'); ?>

<h1>All todos</h1>
<script src="public/js/script.js"></script>
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


<?php require('app/views/testGUI/partials/footer.php'); ?>
  