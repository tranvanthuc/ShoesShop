<?php require('app/views/testGUI/partials/header.php'); ?>

<h1>Categories</h1>

<?php foreach($cates as $cate): ?>

	<li><a href=""><?= $cate->name; ?></a></li>

<?php endforeach; ?>

<?php require('app/views/testGUI/partials/footer.php'); ?>

<?php echo json_encode($cates); ?>