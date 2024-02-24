<?php 
    class User extends CI_Model {
        public function is_admin() {
            $query = "SELECT * FROM users";
            $result = $this->db->query($query)->result_array();
            if(empty($result)) {
                return $is_admin = 1;
            }
            return $is_admin = 0;
        }
        public function insert_data($firstname, $lastname, $email, $contact, $encrypted_password, $salt) {
            $query = "SELECT * FROM users WHERE (email = ? OR contact = ?)";
            $values = array($email, $contact);
            $result = $this->db->query($query, $values)->row_array();
            $is_admin = $this->is_admin();
            if(!empty($result)) {
                return false;
            } else {
                $query = "INSERT INTO users (is_admin, firstname, lastname, email, contact, password, salt) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $values = array($is_admin, $firstname, $lastname, $email, $contact, $encrypted_password, $salt);
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
                }
            }
            return false;
        }
        public function get_profile($id) {
            $query = "SELECT * FROM products WHERE id = ?";
            $value = array($id);
            $result = $this->db->query($query, $value)->row_array();
            return $result;
        }
        public function validate_registration() {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("firstname", "First name", "trim|required");
            $this->form_validation->set_rules("lastname", "Last name", "trim|required");
            $this->form_validation->set_rules("email", "Email address", "trim|required|valid_email");
            $this->form_validation->set_rules("contact", "Contact number", "trim|required|numeric");
            $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
            $this->form_validation->set_rules("confirm_password", "Confirm password", "trim|required|matches[password]");

            if($this->form_validation->run()) {
                return 'valid';
            } else {
                return validation_errors();
            }
        }
        public function validate_login() {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("username", "Contact number or Email", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");

            if($this->form_validation->run()) {
                return 'valid';
            } else {
                return validation_errors();
            }
        }
    }