<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";

$db = new Database();

$product = $db->get_product_by_id($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/gruppinlämning/assets/style.css">
    <title>Edit product</title>
</head>

<body>
<?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Edit Product: <?= $product->get("title")?></h2>
    <form action="/sites/gruppinlämning/scripts/post-edit-product.php?id=<?=$product->get("id")?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $product->get("title") ?>">
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?= $product->get("price") ?>">
        <label for="description">Description</label>
        <textarea name="description"><?= $product->get("description") ?></textarea>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="<?= $product->get("quantity")?>">
        <label for="size">Size:</label>
        <input type="text" name="size" value="<?= $product->get("size") ?>">
        <label for="article_number">Article number:</label>
        <input type="text" name="article_number" value="<?=$product->get("article_number")?>">
        <input type="file" name="image">
        <button type="submit">Submit</button>
    </form>
</body>

</html>