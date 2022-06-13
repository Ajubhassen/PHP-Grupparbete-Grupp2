<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../scripts/authorize.php';

$db = new Database();
$success = false;
$users = $db->get_users_by_order();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Orders</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Orders:</h2>
    <hr>
    <?php if ($users) : ?>
        <div>
            <?php foreach ($users as $user) : ?>
                <div>
                    <a href="/sites/E-commerce/pages/order?user_id=<?= $user["user_id"] ?>">
                        <?= $user["name"] ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div>No Orders</div>
    <?php endif; ?>

</body>

</html>