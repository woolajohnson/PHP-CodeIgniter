<?php 
    class Bookmark extends CI_Model {
        public function view_bookmark() {
            $query = "SELECT * FROM bookmarks";
            return $this->db->query($query)->result_array();
        }
        public function add_bookmark() {
            $name = $this->input->post('name');
            $url = $this->input->post('url');
            $folder_name = $this->input->post('folder_name');
            $query = "INSERT INTO bookmarks (name, url, folder_name) VALUES (?, ?, ?)";
            $values = array($name, $url, $folder_name);
            return $this->db->query($query, $values);
        }
        public function delete_bookmark($id) {
            $query = "DELETE FROM bookmarks WHERE id = ?";
            $value = array($id);
            return $this->db->query($query, $value);
        }
        public function pre_delete($id) {
            $query = "SELECT * FROM bookmarks WHERE id = ?";
            $value = array($id);
            return $this->db->query($query, $value)->row_array();
        }
    }
?>