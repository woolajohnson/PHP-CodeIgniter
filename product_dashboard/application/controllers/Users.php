<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index() {
		if ($this->session->userdata('user_id')) {
			redirect('/users/dashboard');
		} else {
			$this->load->view('login');
		}
	}
	public function register() {
		if ($this->session->userdata('user_id')) {
			redirect('/users/dashboard');
		} else {
			$this->load->view('register');
		}
	}
	public function dashboard() {
		if ($this->session->userdata('user_id')) {
			$this->load->view('dashboard');
		} else {
			redirect('/');
		}
	}
	public function login() {
		if($this->input->post('submit') == 'login') {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("username", "Contact number or Email", "trim|required");
			$this->form_validation->set_rules("password", "Password", "trim|required");
			if($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/');
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->load->model('User');
				$data['result'] = $this->User->get_by_id($username, $password);
				if(!empty($data['result'])) {
					$this->session->set_userdata('user_id', $data['result']['id']);
					$this->session->set_userdata('firstname', $data['result']['firstname']);
					$this->session->set_userdata('lastname', $data['result']['lastname']);
					$this->session->set_userdata('contact', $data['result']['contact']);
					$this->session->set_userdata('last_failed', $data['result']['last_failed']);
					redirect('/users/dashboard');
				} else {
					$this->session->set_flashdata('errors', "Invalid credentials");
					redirect('/');
				}
			}
		}
	}
	public function create() {
		if($this->input->post('submit') == 'register') {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("firstname", "First name", "trim|required");
			$this->form_validation->set_rules("lastname", "Last name", "trim|required");
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules("contact", "Contact Number", "trim|required|numeric");
			$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
			$this->form_validation->set_rules("confirm_password", "Confirm password", "trim|required|matches[password]");
			
			if($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/users/register');
			} else {
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email');
				$contact = $this->input->post('contact');
				$firstname = $this->input->post('firstname');
				$password = $this->input->post('password');
				$salt = bin2hex(openssl_random_pseudo_bytes(22));
        		$encrypted_password = md5($password . '' . $salt);
				$confirm_password = $this->input->post('confirm_password');
				$this->load->model('User');
				$data['result'] = $this->User->insert_data($firstname, $lastname, $email, $contact, $encrypted_password, $salt);

				if(!empty($data['result'])) {
					$this->session->set_flashdata('success', '"Congratulations! You have successfully registered.');
					redirect('/users/register');
				} else {
					echo "Already taken.";
				}
			}
		} else {
			redirect('/');
		}
	}
	public function logout() {
		if ($this->input->post('logout')) {
			if ($this->session->userdata('user_id')) {
				$this->session->unset_userdata('user_id');
			}
			redirect('/');
		}
	}	
}