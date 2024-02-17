<?php
    class Product extends CI_Model {
        public function cart_count() {
            $query = "SELECT * FROM carts";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        public function total_amount() {
            $query = "SELECT * FROM carts";
            $result = $this->db->query($query)->result_array();
            $total_amount = 0;
            foreach($result as $price) {
                $total_amount += $price['total_price'];
            }
            return $total_amount;
        }
        public function view_cart() {
            $query = "SELECT products.*, carts.* FROM products RIGHT JOIN carts ON products.id = carts.product_id";
            $result = $this->db->query($query)->result_array();
            $total_amount = $this->total_amount();
            $result_cart = array($result, $total_amount);
            return $result_cart;
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
                    $cart_quantity = $result['quantity'];
                    $new_quantity = $cart_quantity + $quantity;
                    $new_total_price = $price * $new_quantity;
                    $query = "UPDATE carts SET quantity = ?, total_price = ? WHERE product_id = ?";
                    $values = array($new_quantity, $new_total_price, $product_id);
                    return $this->db->query($query, $values);
                } else {
                    $query = "INSERT INTO carts (product_id, quantity, total_price) VALUES (?, ?, ?)";
                    $values = array($product_id, $quantity, $total_price);
                    return $this->db->query($query, $values);
                }
            }
        }
        public function delete_item($id) {
            $query = "DELETE FROM carts WHERE product_id = ?";
            $value = array($id);
            return $this->db->query($query, $value);
        }
        public function delete_cart() {
            $query = "DELETE FROM carts";
            return $this->db->query($query);
        }
        public function validate_catalog() {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("quantity", "Quantity", "trim|required|greater_than[0]");

            if($this->form_validation->run()) {
                return "valid";
            } else {
                return validation_errors();
            }
        }
        public function validate_billing() {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("billing_name", "Billing name", "trim|required");
            $this->form_validation->set_rules("billing_address", "Billing address", "trim|required");
            $this->form_validation->set_rules("card_number", "Card number", "trim|required|numeric|min_length[13]");

            if($this->form_validation->run()) {
                return "valid";
            } else {
                return validation_errors();
            }
        }
    }