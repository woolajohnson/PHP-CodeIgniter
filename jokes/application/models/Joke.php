<?php
    class Joke extends CI_Model {
        /* This method will fetch all the records and returns the value to be
            received by the controller for display */
        public function joke_count() {
            $query = "SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date 
                        FROM jokes ORDER BY created_at DESC";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        /* This method will fetch a single record and returns the value to be
            received by the controller for display */
        public function view_joke($id) {
            $query = "SELECT * FROM jokes 
                        WHERE id = ?";
            $value = array($id);
            $result = $this->db->query($query, $value)->row_array();
            return $result;
        }
        /* This method will receive sanitized inputs from the controller
            and use the values to be inserted in the jokes table */
        public function create_new($title, $content) {
            $query = "INSERT INTO jokes (title, content) 
                        VALUES (?, ?)";
            $values = array($title, $content);
            return $this->db->query($query, $values);
        }
        /* This method will actually delete a specific record base on the ID that is being
            passed down from the controller */
        public function delete_joke($id) {
            $query = "DELETE FROM jokes 
                        WHERE id = ?";
            $value = array($id);
            return $this->db->query($query, $value);
        }
        /* This method if called, will validate the form that is being submitted.
            If good, it will return a string 'valid' and if not, it will return the
            errors. The controller will handle the returned values. */
        public function validate_joke() {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("title", "Joke title", "trim|required");
            $this->form_validation->set_rules("content", "Joke content", "trim|required");

            if($this->form_validation->run()) {
                return "valid";
            } else {
                return validation_errors();
            }
        }
        /* This method if called, will filter the records from beyond 7 days ago
            and return the result to the controller to be displayed. */
        public function filter_old() {
            $query = "SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date 
                        FROM jokes 
                        WHERE DATE(created_at) < CURDATE() - INTERVAL 7 DAY
                        ORDER BY created_at DESC";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
        /* This method if called, will filter the records within the last 7 days
            and return the result to the controller to be displayed. */
        public function filter_new() {
            $query = "SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date
                        FROM jokes 
                        WHERE DATE(created_at) >= CURDATE() - INTERVAL 7 DAY
                        ORDER BY created_at DESC";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
    }
?>