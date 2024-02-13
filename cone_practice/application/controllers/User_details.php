<?php 
    class User_details extends CI_Controller {
        public function index() {
            $this->load->model('user_model');
            $data['user_data'] = $this->user_model->return_user();
            $this->load->view('user_view', $data);
        }
    }
?>