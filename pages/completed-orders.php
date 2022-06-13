<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../scripts/authorize.php';

$db = new Database();
$completed_orders = $db->get_completed_orders();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/gruppinlämning/assets/style.css">
    <title>Completed Orders</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Completed Orders:</h2>
    <hr>
    <table class="admin-table">
        <tr>
            <th>Orderer</th>
            <th>Email</th>
            <th>Address</th>
            <th>Zip</th>
            <th>Order date</th>

        </tr>

        <?php foreach ($completed_orders as $order) : ?>

            <tr>
                <td><?= $order["name"] ?></td>
                <td><?= $order["email"] ?></td>
                <td><?= $order["address"] ?></td>
                <td><?= $order["zip"] ?></td>
                <td><?= $order["order_date"] ?></td>
            </tr>

        <?php endforeach; ?>



    </table>

</body>

</html>