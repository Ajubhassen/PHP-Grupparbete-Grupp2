<?php
require_once __DIR__ . '/../classes/Cart.php';
session_start();
if (!isset($_GET["id"])) die("No id specified");
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

$new_item = new Cart((int)$_GET["id"], (int)$_POST["quantity"]);
if (count($_SESSION["cart"]) == 0) {
    $_SESSION["cart"][] = $new_item;
} else {
    $dupe = false;
    foreach ($_SESSION["cart"] as $index => $item) {

        if ((int)$item->get_id() == (int) $new_item->get_id()) {

            $dupe = true;
            $_SESSION["cart"][$index]->set_quantity((int)$item->get_quantity() + $new_item->get_quantity());
        }
    }

    if ($dupe == false) {
        $_SESSION["cart"][] = $new_item;
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);


