<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Cart.php";
if (!isset($_SESSION["user"])) {
    $user = new User("", "");
} else {
    $user = $_SESSION["user"];
}
?>

<nav>
    <ul class="navList">
        <li><a href="/sites/E-commerce/pages/index.php">Home</a></li>
        <input type="text" placeholder="Search:">
       
        <?php if ($user->get_user_type() == "user" && strlen($user->get_email()) > 0) : ?>
            <li><a href="/sites/E-commerce/pages/my-orders.php">My Orders</a></li>
            <li><a href="/sites/E-commerce/pages/my-account.php">My Account</a></li>
        <?php endif; ?>

        <?php if ($user->get_user_type() != "admin") : ?>
            
            <li>About</li>
            <li>Contact</li>
            <li><a href="/sites/E-commerce/pages/cart.php">Cart (<?php if (isset($_SESSION["cart"])){echo count($_SESSION["cart"]);} else {echo"0";}?>)</a></li>
        <?php endif; ?>

        

        <!-- Admin Links --->
        <?php if ($user->get_user_type() == 'admin') : ?>
            <li><a href="/sites/E-commerce/pages/orders.php">Orders</a></li>
            
            <li><a href="/sites/E-commerce/pages/accounts.php">Accounts</a></li>
            <li><a href="/sites/E-commerce/pages/all-products.php">Products</a></li>
        <?php endif; ?>

        <!--Login / out-->
        <?php if (!isset($_SESSION["user"])) : ?>
            <li>
                <a href="/sites/E-commerce/pages/login.php">Log in</a>
            </li>
        <?php else : ?>
            <li>
                <a href="/sites/E-commerce/scripts/post-logout.php">Log out</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php if ($user->get_user_type() == 'admin') : ?>
    <div class="productOptions">
        <a href="">New Product</a>
        <a href=""></a>
    </div>

    <div class="orderOptions">
        <a href="/sites/E-commerce/pages/completed-orders.php">Completed orders</a>
    </div>
    
<?php endif; ?>