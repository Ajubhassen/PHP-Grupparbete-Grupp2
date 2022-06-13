<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";
$db = new Database();
$products = $db->get_all_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/gruppinlämning/assets/style.css">
    <title>Products</title>
</head>
<body>
<?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Products:</h2>
    <a href="/sites/gruppinlämning/pages/add-new-product.php">Add new product</a>
    <hr>
    <table class="admin-table">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Creation date</th>
            <th>Last edited</th>
            <th>Article number</th>
            <th>Description</th>
            <th>Options</th>
        </tr>

        <?php foreach ($products as $product) : ?>

            <tr class="admin-table-items">
                <form action="/sites/gruppinlämning/scripts/delete-product-by-id.php?id=<?=$product->get("id")?>" method="post">

                    <td><img src="<?= $product->get("image") ?>" alt="<?= $product->get("title") ?>"></td>
                    <td><?= $product->get("title") ?></td>
                    <td><?= $product->get("price") ?></td>
                    <td><?= $product->get("quantity")?></td>
                    <td><?= $product->get("size") ?></td>
                    <td><?= $product->get("creation_date") ?></td>
                    <td><?= $product->get("last_edited") ?></td>
                    <td><?= $product->get("article_number") ?></td>
                    <td><?= $product->get("description") ?></td>
                    <td class="options">
                        <button type="submit">Remove</button>
                        <a href="/sites/E-commerce/pages/edit-product.php?id=<?= $product->get("id") ?>">
                            Edit
                        </a>
                    </td>
                </form>
            </tr>

        <?php endforeach; ?>



    </table>

    
    
</body>
</html>