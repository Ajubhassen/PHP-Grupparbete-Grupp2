<?php   
class User{
    private $id;
    private $name;
    private $email;
    private $hash_password;
    private $user_type;
    private $address;
    private $zip;

    public function __construct($name, $email, $user_type = "user", $id=0){
        $this->name = $name;
        $this->email = $email;
        if ($id > 0){
            $this->id = $id;
        }
        if ($user_type == "admin"){
            $this->user_type = "admin";
        }else{
            $this->user_type = "user";
        }
    }

    public function set_hash_password($password){
        $this->hash_password = password_hash($password, null);
    }
    public function set_hash($hash) {
        $this->hash_password = $hash;
    }

    public function test_password($password){
        return password_verify($password, $this->hash_password);
    }

    public function get_password_hash(){
        return $this->hash_password;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_user_type(){
        return $this->user_type;
    }

    public function set_user_type($user_type){
        $this->user_type = $user_type;
    }

    public function set_user_email($email){
        $this->user_email = $email;
    }

    public function set_user_name($name){
        $this->name = $name;
    }
    public function get_id(){
        return $this->id;
    }

   public function set_zip($zip){
       $this->zip = $zip;
   }
   public function get_zip(){
       return $this->zip;
   }
   public function set_address($address){
       $this->address = $address;
   }
   public function get_address(){
       return $this->address;
   }
   public function set_id($id){
       $this->id = $id;
   }

}