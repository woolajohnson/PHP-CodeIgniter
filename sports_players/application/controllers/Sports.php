<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Sports extends CI_Controller {
        public function index() {
            $this->display();
        }
        /* If form is submitted, grab the data from the Model
            if there is no data, add flashdata
        */
        public function display() {
            if($this->input->post('submit') == 'search') {
                $name = $this->security->xss_clean($this->input->post('name'));
                $gender = $this->security->xss_clean($this->input->post('gender'));
                $sports = $this->security->xss_clean($this->input->post('sport'));

                $this->load->model('Sport');
                $data['result'] = $this->Sport->search($name, $gender, $sports);
                if(empty($data['result'])) {
                    $this->session->set_flashdata('errors', 'No matches found. Please try refining your search.');
                }
                $this->load->view('index', $data);
            } else {
                $this->load->model('Sport');
                $data['result'] = $this->Sport->display_all();
                $this->load->view('index', $data);
            }
        }
    }