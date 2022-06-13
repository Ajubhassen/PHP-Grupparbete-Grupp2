<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";

$db = new Database();

$user = $db->get_user_by_email($_GET["email"]);
$account = $user;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Edit user</title>
</head>

<body>
<?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Edit user: <?= $account->get_email()?></h2>
    <form action="/sites/E-commerce/scripts/post-edit-account.php?id=<?=$account->get_id()?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $account->get_name() ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $account->get_email() ?>">
        <label for="user_type">Role:</label>
        <select name="user_type">
            <option value="<?= $account->get_user_type()?>"><?= $account->get_user_type()?></option>
            <?php if ($account->get_user_type() == "admin") : ?>
                <option value="user">user</option>
            <?php else: ?>
                <option value="admin">admin</option>
            <?php endif; ?>

        </select>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $account->get_address() ?>">
        <label for="zip">Zip:</label>
        <input type="text" name="zip" value="<?= $account->get_zip() ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>