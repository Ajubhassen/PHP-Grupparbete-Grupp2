<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Database.php';
session_start();
if (!isset($_GET["product_id"])) die("Id value not set");
$db = new Database();
$product = $db->get_product_by_id((int)$_GET["product_id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title><?= $product->get("title") ?></title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <div class="product-content">
    <img src="<?= $product->get("image") ?>" alt="<?= $product->get("title") ?>">
    <div class="product-info">
        <h1><?= $product->get("title") ?></h1>
        <p><?= $product->get("description") ?></p>
        <p>Price: <?= $product->get("price") ?>kr</p>
        <p>Size: <?= $product->get("size") ?></p>
        <div>Avalible quantity: <?= $product->get("quantity") ?></div>
        <p>A.num: <?= $product->get("article_number") ?></p>
    </div>
    </div>
    <form action="/sites/E-commerce/scripts/add-to-cart.php?id=<?= $product->get("id") ?>" method="post">
        <label for="quantity">Add quantity to cart</label>
        <input type="number" value="1" name="quantity">
        <button type="submit">Add to cart</button>
    </form>
</body>

</html>