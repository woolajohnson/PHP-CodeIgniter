<?php 
    class Main extends CI_Controller {
        public function index() {
            if($this->session->userdata('winner') == "" && $this->session->userdata('ticket') == "") {
                $this->session->set_userdata('winner', 0);
                $this->session->set_userdata('ticket', "0000000");
            }
            $this->load->view('raffle');
        }
        public function draw() {
            if($this->input->post('submit')) {
                $winners = rand(0, 10);
                $ticket = rand(1000000, 9999999);
                
                $this->session->set_userdata('winner', $winners);
                $this->session->set_userdata('ticket', $ticket);
                $this->load->view('raffle');
            } else {
                redirect('/');
            }
        }
    }
?>