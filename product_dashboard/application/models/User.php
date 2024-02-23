<?php 
    class User extends CI_Model {
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