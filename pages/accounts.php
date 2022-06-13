<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";
$db = new Database();
$users = $db->get_all_users();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Accounts</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Accounts:</h2>
    <hr>
    <table class="admin-table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User type</th>
            <th>Address</th>
            <th>Zip</th>
            <th>Options</th>
        </tr>

        <?php foreach ($users as $user) : ?>

            <tr>
                <form action="/sites/E-commerce/scripts/delete-user-by-id.php?id=<?=$user->get_id()?>" method="post">

                    <td><?= $user->get_name() ?></td>
                    <td><?= $user->get_email() ?></td>
                    <td><?= $user->get_user_type() ?></td>
                    <td><?= $user->get_address() ?></td>
                    <td><?= $user->get_zip() ?></td>
                    <td>
                        <button type="submit">Remove</button>
                        <a href="/sites/E-commerce/pages/edit-account.php?email=<?= $user->get_email() ?>">
                            Edit
                        </a>
                    </td>
                </form>
            </tr>

        <?php endforeach; ?>



    </table>
</body>

</html>