<?php require 'partials/header.php'; ?>

<!-- update shoe size action  -->
<h1>Submit your updation size</h1>

<form method="POST" action="/sizes/update">
    size: <br/>
    <input type="text" name="size" >
    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>