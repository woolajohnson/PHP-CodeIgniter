<?php 
    class My_model extends CI_Model {
        public function firstName() {
            $lastName = $this->lastName();
            return "Android " . $lastName;
        }
        private function lastName() {
            return "18";
        }
    }
?>