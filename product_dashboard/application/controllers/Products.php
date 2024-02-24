<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Products extends CI_Controller {
        public function index() {
            $this->dashboard();
        }
        public function dashboard() {
            $this->load->view('admin/dashboard');
        }
        public function new() {
            $this->load->view('admin/new');
        }
        public function edit() {
            $this->load->view('admin/edit');
        }
    }

?>