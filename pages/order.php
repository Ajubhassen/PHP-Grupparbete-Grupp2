<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";

if (!isset($_GET["user_id"])) die("You must enter an id");
$db = new Database();
$products = $db->get_product_from_order_id($_GET["user_id"]);
$user = $db->get_user_by_email($products[1]["email"]);
$orderer = $user;
if ($user == null) die("<h3>Order does not exist</h3>");
$total_quantity = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Order</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2><?php echo "{$orderer->get_name()} ({$orderer->get_email()})"; ?>'s order:</h2>
    <h4>Order date: <?= $products[0]["order_date"] ?></h4>
    <hr>
    <div>
        <h4>Delivery details:</h4>
        <p>Address: <?= $orderer->get_address() ?></p>
        <p>Zip: <?= $orderer->get_zip() ?></p>
    </div>

    <table class="admin-table">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Article number</th>
            <th>Image</th>
            <th>Options</th>

        </tr>
        <?php foreach ($products as $product) : ?>
            <?php $total_quantity += $product["order_quantity"]; ?>
            
            <tr>
                <form action="/sites/E-commerce/scripts/delete-order-by-order-id?id=<?= $product['order_id'] ?>" method="post">
                    <td>
                        <a href="/sites/E-commerce/pages/product?product_id=<?= $product["product_id"] ?>">
                            <?= $product["title"] ?>
                        </a>
                    </td>
                    <td><?= $product["price"] ?></td>
                    <td><?= $product["order_quantity"] ?></td>
                    <td><?= $product["size"] ?></td>
                    <td><?= $product["article_number"] ?></td>
                    <td><?= $product["image"] ?></td>
                    <td><button type="submit">Remove</button></td>

                </form>
            </tr>

        <?php endforeach; ?>
    </table>
    <div>Total Items: <?= $total_quantity ?></div>
    
    <form action="/sites/E-commerce/scripts/complete-order?user_id=<?=$products[0]["user_id"]?>&order_date=<?=$products[0]["order_date"]?>" method="post">
    <button type="submit">Complete</button>
    </form>

</body>

</html>