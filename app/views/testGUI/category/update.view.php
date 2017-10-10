<h1>Update category</h1>

<form action="/cate/postUpdate" method="POST">
	<input type="text" name="id" value="<?= $cate->id ?>" hidden>
	<input type="text" name="name" value="<?= $cate->name; ?>">
	<input type="text" name="gender" value="<?= $cate->gender; ?>">
	<button type="submit">Update</button>
</form>