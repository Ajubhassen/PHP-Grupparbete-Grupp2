<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
if (!isset($_SESSION)){session_start();}
$db = new Database();
$products = $db->get_all_products();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Products</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <?php foreach ($products as $product) : ?>
        <div class="product-card">
        <a href="/sites/E-commerce/pages/product?product_id=<?= $product->get("id") ?>">
            <div><?= $product->get("title") ?></div>
        </a>
        <form action="/sites/E-commerce/scripts/add-to-cart.php?id=<?= $product->get("id") ?>" method="post">
            <input type="number" value="1" name="quantity">
            <button>Add to cart</button>
        </form>

        </div>
    <?php endforeach; ?>
</body>

</html>