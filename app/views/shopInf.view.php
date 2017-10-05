<?php require 'partials/header.php'; ?>

<!-- View all shop informations  -->
<h1>Shop Information</h1>

<ul style="list-style-type:none">
    <!-- render all shop information in the information table -->
    <?php foreach($shopInf as $shop): ?> 
        <li>ID: <?= $id = $shop->id; ?></li> <br />           
        <li>name: <?= $shop->name; ?></li> <br />
        <li>description: <?= $shop->description; ?></li><br />
        <li>address: <?= $shop->address; ?></li><br />
        <li>phone: <?= $shop->phone; ?></li><br />
        <li>email: <?= $shop->email; ?></li><br />

        <!-- delete shop informaton action  -->
        <li>
            <form action = "/shopInf/delete" method = "POST">
                <input name = "id" type = "hidden" value="<?php echo $id; ?>">
                <input type = "submit" value = "Delete">
            </form>
        </li><br />

        <!-- update shop information action  -->
        <li>
            <form action = "/shopInf/update" method = "GET">
                <input name = "id" type = "hidden" value="<?php echo $id; ?>">
                <input type = "submit" value = "Update">
            </form>
        </li><br />
    <?php endforeach; ?>
</ul><br />

<!-- insert user action  -->
<h1>Submit your shop information</h1>

<form method="POST" action="/shopInf">
    <input type="text" name="name">
    <input type="text" name="description">
    <input type="text" name="address">
    <input type="text" name="phone">
    <input type="text" name="email">
    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>