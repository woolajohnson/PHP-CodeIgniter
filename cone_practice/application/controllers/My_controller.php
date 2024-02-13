<?php
    class My_controller extends CI_Controller {
        public function index() {
            $this->load->view('myindexview');
        }
        public function test() {
            $this->load->model('my_model');
            $name = $this->my_model->firstName();
            echo "Hi I am " . $name;
        }
        
    }
?>