<?php 
class Order{
    private $id;
    private $user_id;
    private $product_id;
    private $order_quantity;
    private $order_date;

    public function __construct($user_id, $product_id, $order_quantity = 1, $id = 0) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->order_quantity = $order_quantity;
        $this->order_date = date("Y-m-d H:i:s");
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function get_id(){
        return $this->id;
    }

    public function get_product_id(){
        return $this->product_id;
    }

    public function get_quantity() {
        return $this->order_quantity;
    }
    public function get_date() {
        return $this->order_date;
    }

    public function set_order_date($order_date){
        $this->order_date = $order_date;
    }


}