<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Jokes extends CI_Controller {
        public function index() {
            $this->display_jokes();
        }
        /* This method will fetch the records from the model to be display in the view jokes.php */
        public function display_jokes() {
            $this->load->model('Joke');
            $data['result'] = $this->Joke->joke_count();
            $this->load->view('jokes', $data);
        }
        /* This method will filter the records based from the user choices.
            If recent is selected, the controller will call the filter_new method in the model,
            elseif it will call the filter_old method if old is selected, else it will go back to homepage */
        public function filter_jokes() {
            $this->load->model('Joke');
            if ($this->input->post('filter') == 'old') {
                $data['result'] = $this->Joke->filter_old();
            } elseif ($this->input->post('filter') == 'recent') {
                $data['result'] = $this->Joke->filter_new();
            } else {
                redirect('/');
            }
            $this->load->view('jokes_list', $data);
        }
        public function new() {
            $this->load->view('new');
        }
        /* This method will check if the button is clicked, and if it did
            it will call the validation method from the model.
            If valid, it will insert new record to the database, calling the create_new method from model */
        public function create() {
            if($this->input->post('submit') == 'insert') {
                $this->load->model('Joke');
                $result = $this->Joke->validate_joke();
                if($result == 'valid') {
                    $title = $this->security->xss_clean($this->input->post('title'));
                    $content = $this->security->xss_clean($this->input->post('content'));

                    $this->load->model('Joke');
                    $this->Joke->create_new($title, $content);
                    $this->session->set_flashdata('success', 'You have successfully added a joke.');
                    redirect('/');
                } else {
                    $this->session->set_flashdata('errors', $result);
                    redirect('/jokes/new');
                }
            }
        }
        /* This method will fetch specific record from the model to be display in the view joke.php */
        public function joke($id) {
            $this->load->model('Joke');
            $data['result'] = $this->Joke->view_joke($id);
            $this->load->view('joke', $data);
        }
        /* This method will display the confirmation message if you want to delete a specific record.
            This will call the method get_by_id in the model*/
        public function delete($id) {
            $this->load->model('Joke');
            $data['result'] = $this->Joke->view_joke($id);
            $this->load->view('delete', $data);
        }
        /* After you confirm wether you will delete the record or not, this method will run.
            If the value of the button you click is 'yes', the it will call the delete_joke method in the model
            to delete the specific record that has an id of $id. If you choose 'no', then it will just redirect to the home page */
        public function destroy($id) {
            if($this->input->post('submit') == 'yes') {
                $this->load->model('Joke');
                $this->Joke->delete_joke($id);
                $this->session->set_flashdata('success', 'Joke successfully deleted.');
                redirect('/');
            } else {
                redirect('/');
            }
        }
    }
?>