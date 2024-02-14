<?php 
    class Main extends CI_Controller {
        public function index() {
            $this->load->view('form.php');
        }
        public function result() {
            if($this->input->post('submit')) {
                $name = $this->input->post('name');
                $course_title = $this->input->post('course_title');
                $score = $this->input->post('score');
                $reason = $this->input->post('reason');

                $data['result'] = array(
                    "name" => $name,
                    "course_title" => $course_title,
                    "score" => $score,
                    "reason" => $reason
                );
                $this->load->view('result', $data);
            } else {
                redirect('/');
            }
        }
        public function return() {
            redirect('/');
        }
    }
?>