<?php
require_once __DIR__ . '/../classes/Cart.php';
require_once __DIR__ . '/../classes/Database.php';
session_start();

$cart = [];
$db = new Database();
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $product) {
        $cart[] = $db->get_product_by_id((int)$product->get_id());
    }
}
$cost = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Your cart:</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h1>Your cart: </h1>
    <?php if ($cart) : ?>
        <?php foreach ($cart as $index => $product) : ?>
            <div><?= $product->get("title") ?>, <?= $_SESSION["cart"][$index]->get_quantity() ?></div>
            <?php $cost += $product->get("price")?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!$cart) : ?>
        <div>Your cart is empty, add items <a href="/sites/E-commerce/pages/index.php">here.</a></div>
    <?php endif; ?>

    <?php if ($cart) : ?>
        <div>
            <div>Total: <?=$cost?>kr</div>
            <form action="/sites/E-commerce/scripts/clear-cart.php">
                <button type="submit">Clear Cart</button>
            </form>
            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]->get_address() == null) : ?>
                <form action="/sites/E-commerce/scripts/post-create-order.php" method="post">
                    <input type="address" required name="address" placeholder="Address:">
                    <input type="zip" required name="zip" placeholder="Zip-code:" pattern="\d+">
                    <input type="text" required placeholder="Card-number:">
                    <input type="text" required placeholder="CVC:">
                    <input type="text" required placeholder="Expiration-date:">
                    <button type="submit">Order</button>
                </form>
            <?php elseif (isset($_SESSION["user"]) && $_SESSION["user"]->get_address() != null): ?>
                <form action="/sites/E-commerce/scripts/post-create-order.php" method="post">
                    
                    <input type="text" required placeholder="Card-number:">
                    <input type="text" required placeholder="CVC:">
                    <input type="text" required placeholder="Expiration-date:">
                    <button type="submit">Order</button>
                </form>
            <?php else : ?>
                <h3>Log in or sign up to buy</h3>
                <a href="/sites/E-commerce/pages/register.php">Sign up!</a>
                <a href="/sites/E-commerce/pages/login.php">Log in</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>

</html>