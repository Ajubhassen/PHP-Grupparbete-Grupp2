<?php 
class Product{
    private $id;
    private $title;
    private $price;
    private $description;
    private $quantity;
    private $size;
    private $creation_date;
    private $last_edited;
    private $image;
    private $article_number;
    
    public function __construct($title, $price, $description, $size, $article_number, $quantity = 0, $creation_date = "", $last_edited = "", $id = 0) {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->size = $size;
        $this->article_number = $article_number;
        $this->quantity = $quantity;
        if ($creation_date != "") {
            $this->creation_date = $creation_date;
        }else{
            $this->creation_date = date("Y-m-d H:i:s");
        }
        if ($last_edited != "") {
            $this->last_edited = $last_edited;
        }else{
            $this->last_edited = date("Y-m-d H:i:s");
        }
        if ($id > 0) {
            $this->id = $id;
        }

    }

    public function get($attribute){
        return $this->$attribute;
    }

    public function set($attribute, $value){
        $this->$attribute = $value;
    }

    public function update_last_edited(){
        $this->last_edited = date("Y-m-d H:i:s");
    }

    public function set_image($image){
        $this->image = $image;
    }





}