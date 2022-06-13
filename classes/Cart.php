<?php
class Cart{
    private $quantity;
    private $product_id;
    public function __construct($product_id, $quantity = 1){
        $this->quantity = $quantity;
        $this->product_id = $product_id;
    }

    public function get_id(){
        return $this->product_id;
    }
    public function get_quantity(){
        return $this->quantity;
    }
    public function set_quantity($quantity)
    {
        $this->quantity = $quantity;
    }

}