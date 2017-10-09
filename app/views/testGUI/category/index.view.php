<?php require('app/views/testGUI/partials/header.php'); ?>

<h1>Categories</h1>

<ul>

	<?php
	foreach($cates as  $cate) :

		$deleteUrl = "http://". $_SERVER['HTTP_HOST'] . "/cate/delete/?id={$cate->id}";
	?>
	<!-- $todo->completed ? "" -->

	<li>
		<a href=""><?= $cate->name ?></a>
		<button onclick="deleteTodo('<?= $deleteUrl ?>', '<?= $cate->name ?>')">&#10006;</button>
	</li>

<?php endforeach; ?>
</ul>

<?php require('app/views/testGUI/partials/footer.php'); ?>

<?php echo json_encode($cates); ?>