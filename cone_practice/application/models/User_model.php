<?php 
    class User_model extends CI_Model {
        public function return_user() {
            $newArr = array(
                "name" => "John Doe",
                "address" => "Cebu",
                "age" => 20
            );
            return $newArr;
        }
    }

?>