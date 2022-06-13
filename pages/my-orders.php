<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
session_start();
if (!isset($_SESSION["user"]) || !isset($_SESSION["logged_in"])) die("No user");

$db = new Database();
$user = $_SESSION["user"];
$orders = $db->get_completed_orders_by_userid($user->get_id());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Your Orders</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Your Order:</h2>
    <h3>Status:</h3>
    <p><?php if($orders[0]["done"] == 1){echo "In delivery";} else {echo "In packing";} ?></p>
    <h3>Order date:</h3>
    <p><?=$orders[0]["order_date"]?></p>
    <h3>Delivery details:</h3>
    <p><?=$orders[0]["address"]?></p>
    <p><?=$orders[0]["zip"]?></p>
    <hr>
    <table class="admin-table">
        <tr>
            <th>Order id</th>
            <th>Product</th>
            <th>Quantity</th>

        </tr>

        <?php foreach ($orders as $product) : ?>

            <tr>
                <td><?= $product["order_id"] ?></td>
                <td><?= $product["title"] ?></td>
                <td><?= $product["order_quantity"] ?></td>
            </tr>

        <?php endforeach; ?>



    </table>

</body>

</html>