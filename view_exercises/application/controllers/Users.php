<?php 
    class Users extends CI_Controller {
        public function index() {
            $this->load->view('users/index');
        }
        public function new() {
            $this->load->view('users/new');
        }
    }
?>