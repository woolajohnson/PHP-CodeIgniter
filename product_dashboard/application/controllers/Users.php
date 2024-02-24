<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index() {
		if ($this->session->userdata('user_id')) {
			$this->load->view('admin/dashboard');
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
			$this->load->view('admin/dashboard');
		} else {
			redirect('/');
		}
	}
	public function login() {
		if($this->input->post('submit') == 'login') {
			$this->load->model('User');
			$result = $this->User->validate_login();

			if($result == 'valid') {
				$username = $this->security->xss_clean($this->input->post('username'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$this->load->model('User');
				$data['result'] = $this->User->get_by_id($username, $password);
				if(!empty($data['result'])) {
					$this->session->set_userdata('user_id', $data['result']['id']);
					$this->session->set_userdata('firstname', $data['result']['firstname']);
					$this->session->set_userdata('lastname', $data['result']['lastname']);
					$this->session->set_userdata('contact', $data['result']['contact']);
					$this->session->set_userdata('last_failed', $data['result']['last_failed']);
					redirect('/products');
				} else {
					$this->session->set_flashdata('errors', "Invalid credentials");
					redirect('/');
				}
			} else {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/');
			}
		}
	}
	public function create() {
		if($this->input->post('submit') == 'register') {
			$this->load->model('User');
			$result = $this->User->validate_registration();
			
			if($result == 'valid') {
				$firstname = $this->security->xss_clean($this->input->post('firstname'));
				$lastname = $this->security->xss_clean($this->input->post('lastname'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$contact = $this->security->xss_clean($this->input->post('contact'));
				$firstname = $this->security->xss_clean($this->input->post('firstname'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$salt = bin2hex(openssl_random_pseudo_bytes(22));
        		$encrypted_password = md5($password . '' . $salt);
				$confirm_password = $this->security->xss_clean($this->input->post('confirm_password'));
				$this->load->model('User');
				$data['result'] = $this->User->insert_data($firstname, $lastname, $email, $contact, $encrypted_password, $salt);

				if(!empty($data['result'])) {
					$this->session->set_flashdata('success', '"Congratulations! You have successfully registered.');
					redirect('/users/register');
				} else {
					$this->session->set_flashdata('errors', 'Contact number or Email is already taken.');
					redirect('/users/register');
				}
			} else {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/users/register');
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