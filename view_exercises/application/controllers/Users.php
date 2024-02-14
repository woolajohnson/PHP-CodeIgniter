<?php 
    class Users extends CI_Controller {
        public function index() {
            $this->load->view('users/index');
        }
        public function new() {
            $this->load->view('users/new');
        }
        public function create() {
            if($this->input->post('submit')) {
                $this->load->view('users/create');
            } else {
                redirect('/users/new');
            }
        }
        public function count() {
            $visit_count = $this->session->userdata('visit_count');

            if(!$visit_count) {
                $visit_count = 0;
                $this->session->set_userdata('visit_count', $visit_count);
            }
            $visit_count++;
            $this->session->set_userdata('visit_count', $visit_count);
            $this->load->view('users/count');
        }
        public function reset() {
            $this->session->set_userdata('visit_count', 0);
            $this->load->view('users/reset');
        }
        public function say($anything = '', $count_anything = 0) {
            $data['any'] = array(
                "words" => $anything,
                "count_words" => $count_anything
            );
    
            if (!is_numeric($count_anything)) {
                $this->session->set_flashdata('error_message', "Sorry. This URL does not meet our requirement.");
            }
    
            $this->load->view('users/say', $data);
        }
        public function mprep() {
            $view_data['all_data'] = array(
                'name' => "Michael Choi",
                'age'  => 40,
                'location' => "Seattle, WA",
                'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas", "Sleeping")
            );
            $this->load->view('users/mprep', $view_data);
        }
    }
?>