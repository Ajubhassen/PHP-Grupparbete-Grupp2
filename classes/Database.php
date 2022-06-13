<?php 

require_once __DIR__."/User.php";
require_once __DIR__."/Order.php";
require_once __DIR__."/Product.php";

class Database{

    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $db = "ecommerce";
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        if (!$this->conn) die ("Could not connect to database");
    }

    public function delete_order_by_id($id){
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }

    public function add_product(Product $product){
        $query = "INSERT INTO products (title, price, description, quantity, size, creation_date, last_edited, image, article_number) VALUES (?,?, ?, ?, ?, ?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $title =  $product->get("title");
        $price = $product->get("price");
        $description = $product->get("description");
        $quantity = $product->get("quantity");
        $size = $product->get("size");
        $creation_date = $product->get("creation_date");
        $last_edited = $product->get("last_edited");
        $image = $product->get("image");
        $article_number = $product->get("article_number");
        $stmt->bind_param("sdsisssbs", $title, $price, $description, $quantity, $size, $creation_date, $last_edited, $image, $article_number);
        return $stmt->execute();
    }
    public function delete_product_by_id($id){
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }

    public function get_all_products() {
        $query = "SELECT * FROM products";
        $stmt = mysqli_prepare($this->conn, $query);
        $success = $stmt->execute();
        if(!$success) {
            var_dump($stmt->error);
        }
        $result = $stmt->get_result();
        $db_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $products = [];
        foreach($db_products as $product){
            $products[] = new Product($product["title"],$product["price"],$product["description"], $product["size"], $product["article_number"], $product["quantity"], $product["creation_date"], $product["last_edited"], $product["id"]);
        }
        return $products;
    }

    public function get_product_by_id($id) {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        if(!$success) {
            var_dump($stmt->error);
        }
        $result = $stmt->get_result();
        $db_products = mysqli_fetch_assoc($result);
        
        $products = new Product($db_products["title"],$db_products["price"],$db_products["description"], $db_products["size"], $db_products["article_number"], $db_products["quantity"], $db_products["creation_date"], $db_products["last_edited"], $db_products["id"]);
        
        return $products;
    }



    public function complete_order($id, $order_date){
        $query = "UPDATE `orders` SET `done` = '1' WHERE `user_id` = ? AND `order_date` = ?;";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("is", $id, $order_date);
        $success = $stmt->execute();
        return $success;
    }

    public function get_all_users(){
        $query = "SELECT * FROM users";
        $stmt = mysqli_prepare($this->conn, $query);
        $success = $stmt->execute();
        if(!$success) {
            var_dump($stmt->error);
        }
        $result = $stmt->get_result();
        $db_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $users = [];
        foreach($db_users as $user){
            $u = new User($user["name"],$user["email"],$user["user_type"], $user["id"]);
            $u->set_address($user["address"]);
            $u->set_zip($user["zip"]);
            $users[] = $u;
        }
        return $users;

    }

    public function get_completed_orders(){
        $query = "SELECT DISTINCT user_id, name, email, order_date, address, zip FROM `orders` JOIN users ON users.id = user_id WHERE done = 1 ORDER BY order_date;";
        $stmt = mysqli_prepare($this->conn, $query);
        $success = $stmt->execute();
        if(!$success) {
            var_dump($stmt->error);
        }
        $result = $stmt->get_result();
        $db_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $db_users;
    }

    public function update_user(User $user){
        $query = "UPDATE users SET name = ?, email = ?, user_type = ?, address = ?, zip = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $user->get_name();
        $email = $user->get_email();
        $user_type = $user->get_user_type();
        $address = $user->get_address();
        $zip = $user->get_zip();
        $id = $user->get_id();
        $stmt->bind_param("sssssi", $name, $email, $user_type, $address, $zip, $id);
        $success = $stmt->execute();
        return $success;
    }

    public function delete_user_by_id($id){
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function update_product(Product $product){
        $query = "UPDATE products SET title = ?, price= ?, description = ?, quantity = ?, size = ?, creation_date = ?, last_edited = ?, image = ?, article_number = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $title =  $product->get("title");
        $price = $product->get("price");
        $description = $product->get("description");
        $quantity = $product->get("quantity");
        $size = $product->get("size");
        $creation_date = $product->get("creation_date");
        $last_edited = $product->get("last_edited");
        $image = $product->get("image");
        $article_number = $product->get("article_number");
        $id = $product->get("id");
        $stmt->bind_param("sdsisssbsi", $title, $price, $description, $quantity, $size, $creation_date, $last_edited, $image, $article_number, $id);
        return $stmt->execute();
    }

    public function get_completed_orders_by_userid($id){
        $query = "SELECT order_date, address, zip, title, order_quantity, done, orders.id AS order_id FROM `orders` JOIN `products` ON orders.product_id = products.id JOIN `users` ON users.id = orders.user_id WHERE done = 1 AND user_id = ? ORDER BY order_date;";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("s", $id);
        $success = $stmt->execute();
        if(!$success) {
            var_dump($stmt->error);
        }
        $result = $stmt->get_result();
        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $db_orders;
    }

    public function get_google_user_id(User $user){
        $db_user = $this->get_user_by_email($user->get_email());
         if ($db_user == null){
             $query = "INSERT INTO users (username) VALUES (?)";
             $stmt = mysqli_prepare($this->conn, $query);
             $username = $user->get_email();
             $stmt->bind_param("s", $username);
             $success = $stmt->execute();
             if ($success){
                 $user->set_id($stmt->insert_id);
             }else{
                 die("Error saving google user to database");
             }
         }else{
             $user = $db_user;
         }
 
         return $user->get_id();
     }

}