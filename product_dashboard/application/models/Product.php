<?php 
    class Product extends CI_Model {
        public function view() {
            $query = "SELECT * FROM products";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        public function get_by_id($id) {
            $query = "SELECT * FROM products WHERE id = ?";
            $value = array($id);
            $result = $this->db->query($query, $value)->row_array();
            return $result;
        }
        public function insert($name, $description, $price, $inventory_count) {
            $query = "INSERT INTO products (name, description, price, inventory_count) VALUES (?, ?, ?, ?)";
            $values = array($name, $description, $price, $inventory_count);
            $result = $this->db->query($query, $values);
        }
        public function update($name, $description, $price, $inventory_count, $id) {
            $query = "UPDATE products SET name = ?, description = ?, price = ?, inventory_count = ? WHERE id = ?";
            $values = array($name, $description, $price, $inventory_count, $id);
            $result = $this->db->query($query, $values);
        }
        public function delete($id) {
            $query = "DELETE FROM products WHERE id = ?";
            $value = array($id);
            $this->db->query($query, $value);
        }
    }

?>