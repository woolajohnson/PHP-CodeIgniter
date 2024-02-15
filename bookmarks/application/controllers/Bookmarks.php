<?php
    class Bookmarks extends CI_Controller {
        public function index() {
            $this->load->model('Bookmark');
            $data['result'] = $this->Bookmark->view_bookmark();
            $this->load->view('bookmark_view', $data);
        }
        public function add() {
            if($this->input->post('submit') == 'form_add') {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("name", "Name", "trim|required");
                $this->form_validation->set_rules("url", "URL", "trim|required|valid_url");
                if($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('errors', validation_errors());
                    redirect('/');
                } else {
                    $this->load->model('Bookmark');
                    $this->Bookmark->add_bookmark();
                    $this->session->set_flashdata('success', 'Bookmark successfully added.');
                    redirect('/');
                }
            } else {
                redirect('/');
            }
        }
        public function destroy($id) {
            if($this->input->post('submit') == 'destroy') {
                $this->load->model('Bookmark');
                $data['result'] = $this->Bookmark->pre_delete($id);
                $this->load->view('confirm_view', $data);
            } else {
                redirect('/');
            }
        }
        public function delete($id) {
            if($this->input->post('submit') == 'yes') {
                $this->load->model('Bookmark');
                $this->Bookmark->delete_bookmark($id);
                $this->session->set_flashdata('errors', 'Bookmark successfully deleted.');
                redirect('/');
            } else if($this->input->post('submit') == 'no') {
                redirect('/');
            } else {
                redirect('/');
            }
            
        }
    }
?>