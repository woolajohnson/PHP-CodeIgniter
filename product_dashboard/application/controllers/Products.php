<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Products extends CI_Controller {
        public function index() {
            $this->dashboard();
        }
        public function dashboard() {
            $this->load->model('Product');
            $data['result'] = $this->Product->view();
            $this->load->view('admin/dashboard', $data);
        }
        public function new() {
            $this->load->view('admin/new');
        }
        public function edit() {
            $this->load->view('admin/edit');
        }
        public function create() {
            $this->load->model('Product');
            if($this->input->post('submit') == 'insert') {
                $name = $this->security->xss_clean($this->input->post('name'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $price = $this->security->xss_clean($this->input->post('price'));
                $inventory_count = $this->security->xss_clean($this->input->post('inventory_count'));

                $this->Product->insert($name, $description, $price, $inventory_count);
                redirect('products');
            }
            
        }
        public function show($id) {
            $this->load->model('Product');
            $data['result'] = $this->Product->get_by_id($id);
            $this->load->view('show', $data);
        }
        public function action($id) {
            $this->load->model('Product');
            $data['result'] = $this->Product->get_by_id($id);
            if($this->input->post('submit') === 'edit') {
                $this->load->view('admin/edit', $data);
            } elseif ($this->input->post('submit') === 'remove') {
                $this->load->view('admin/remove', $data);
            } else {
                redirect('products');
            }
        }
        public function update($id) {
            $this->load->model('Product');
            if($this->input->post('submit') === 'update') {
                $name = $this->security->xss_clean($this->input->post('name'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $price = $this->security->xss_clean($this->input->post('price'));
                $inventory_count = $this->security->xss_clean($this->input->post('inventory_count'));

                $this->Product->update($name, $description, $price, $inventory_count, $id);
                redirect('products');
            }
        }
        public function delete($id) {
            if($this->input->post('submit') === 'no') {
                redirect('products');
            } elseif ($this->input->post('submit') === 'yes') {
                $this->load->model('Product');
                $this->Product->delete($id);
                redirect('products');
            } else {
                redirect('products');
            }
        }
    }

?>