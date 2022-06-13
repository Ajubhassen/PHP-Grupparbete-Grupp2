<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>New Product</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/navbar.php" ?>
    <form action="/sites/E-commerce/scripts/post-new-product.php" method="post">
        <input type="text" name="title" placeholder="Title:">
        <textarea name="description" cols="30" rows="10" placeholder="Description:"></textarea>
        <input type="number" name="price" placeholder="Price:">
        <input type="text" name="size" placeholder="Size:">
        <input type="text" name="quantity" placeholder="Quantity:">
        <input type="text" name="article_number" placeholder="Article number:">
        <input type="file" name="image">
        <button type="submit">Submit</button>   
    </form>

</body>

</html>