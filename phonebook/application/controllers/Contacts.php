<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
	public function index() {
		$this->load->model('Contact');
		$data['result'] = $this->Contact->get_data();
		$this->load->view('index', $data);
	}
	public function new() {
		$this->load->view('new');
	}
	public function edit($id) {
		if($this->input->post('submit') == 'edit') {
			$this->load->model('Contact');
			$data['result'] = $this->Contact->get_by_id($id);
			$this->load->view('edit', $data);
		} elseif($this->input->post('submit') == 'back') {
			redirect('/');
		}
	}
	public function show($id) {
		$this->load->model('Contact');
		$data['result'] = $this->Contact->get_by_id($id);
		$this->load->view('show', $data);
	}
	public function create() {
		if($this->input->post('submit') == 'insert') {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name", "Name", "trim|required");
			$this->form_validation->set_rules("contact", "Contact Number", "trim|required|numeric");
			if($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/contacts/new');
			} else {
				$name = $this->input->post('name');
				$contact = $this->input->post('contact');
				$this->load->model('Contact');
				$this->Contact->insert_data($name, $contact);
				$this->session->set_flashdata('success', 'Contact successfully added.');
				redirect('/');
			}
		} elseif($this->input->post('submit') == 'back') {
			redirect('/');
		} else {
			redirect('/');
		}
	}
	public function destroy($id) {
		$this->load->model('Contact');
		$data['result'] = $this->Contact->get_by_id($id);
		$this->load->view('remove', $data);
	}
	public function delete($id) {
		if($this->input->post('submit') == 'yes') {
			$this->load->model('Contact');
			$this->Contact->delete_data($id);
			$this->session->set_flashdata('errors', 'Contact successfully deleted.');
			redirect('/');
		} elseif($this->input->post('submit') == 'no') {
			redirect('/');
		} else {
			redirect('/');
		}
	}
	public function update($id) {
		if($this->input->post('submit') == 'save') {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name", "Name", "trim|required");
			$this->form_validation->set_rules("contact", "Contact Number", "trim|required|numeric");
			if($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->load->model('Contact');
				$data['result'] = $this->Contact->get_by_id($id);
				$this->load->view('edit', $data);
			} else {
				$name = $this->input->post('name');
				$contact = $this->input->post('contact');
				$this->load->model('Contact');
				$data['result'] = $this->Contact->update_data($id, $name, $contact);
				$this->session->set_flashdata('success', 'Contact successfully updated.');
				redirect('/');
			}
		} elseif($this->input->post('submit') == 'back') {
			redirect('/');
		} else {
			redirect('/');
		}
	}
}