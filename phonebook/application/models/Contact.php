<?php 
    class Contact extends CI_Model {
        public function insert_data($name, $contact) {
            $query = "INSERT INTO contacts (name, contact) VALUES (?, ?)";
            $values = array($name, $contact);
            return $this->db->query($query, $values);
        }
        public function get_data() {
            $query = "SELECT * FROM contacts";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        public function update_data($id, $name, $contact) {
            $query = "UPDATE contacts SET name = ?, contact = ? WHERE id = ?";
            $values = array($name, $contact, $id);
            return $this->db->query($query, $values);
        }
        public function delete_data($id) {
            $query = "DELETE FROM contacts WHERE id = ?";
            $value = array($id);
            return $this->db->query($query, $value);
        }
        public function get_by_id($id) {
            $query = "SELECT * FROM contacts WHERE id = ?";
            $value = array($id);
            $result = $this->db->query($query, $value)->row_array();
            return $result;
        }
    }