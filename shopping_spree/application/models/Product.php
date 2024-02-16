<?php 
    class Product extends CI_Model {
        public function cart_count() {
            $query = "SELECT * FROM carts";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        public function add_product($product_name, $quantity) {
            $query = "SELECT * FROM products WHERE product_name = ?";
            $value = array($product_name);
            $result = $this->db->query($query, $value)->row_array();
            $product_id = $result['id'];
            $price = $result['price'];
            $total_price = $price * $quantity;

            if(!empty($result)) {
                $query = "SELECT * FROM carts WHERE product_id = ?";
                $value = array($product_id);
                $result = $this->db->query($query, $value)->row_array();

                if(!empty($result)) {
                    $query = "UPDATE carts SET quantity = ?, total_price = ? WHERE product_id = ?";
                    $values = array($quantity, $total_price, $product_id);
                    return $this->db->query($query, $values);
                } else {
                    $query = "INSERT INTO carts (product_id, quantity, total_price) VALUES (?, ?, ?)";
                    $values = array($product_id, $quantity, $total_price);
                    return $this->db->query($query, $values);
                }
            } 
        }
        public function insert_data($firstname, $lastname, $email, $contact, $encrypted_password, $salt) {
            $query = "SELECT * FROM users WHERE (email = ? OR contact = ?)";
            $values = array($email, $contact);
            $result = $this->db->query($query, $values)->row_array();
            if(!empty($result)) {
                return false;
            } else {
                $query = "INSERT INTO users (firstname, lastname, email, contact, password, salt) VALUES (?, ?, ?, ?, ?, ?)";
                $values = array($firstname, $lastname, $email, $contact, $encrypted_password, $salt);
                return $this->db->query($query, $values);
            }
        }
        public function get_by_id($username, $password) {
            $query = "SELECT * FROM users WHERE (email = ? OR contact = ?)";
            $values = array($username, $username);
            $result = $this->db->query($query, $values)->row_array();

            if(!empty($result)) {
                $encrypted_password = md5($password . '' . $result['salt']);
                if($result['password'] == $encrypted_password) {
                    return $result;
                } else {
                    $query = "UPDATE users SET last_failed = NOW() WHERE (email = ? OR contact = ?)";
                    $values = array($username, $username);
                    $this->db->query($query, $values);
                    return false;
                }
            }
            return false;
        }
    }