<?php
    class Products extends CI_Controller {
        public function index() {
            redirect('/products/catalog');
        }
        public function catalog() {
            $this->load->model('Product');
            $data['result'] = $this->Product->cart_count();
            $this->load->view('catalog', $data);
        }
        public function load_cart() {
            redirect('/products/cart');
        }
        public function cart() {
            $this->load->model('Product');
            $data['result'] = $this->Product->view_cart();
            $this->load->view('cart', $data);
        }
        public function add_cart() {
            if ($this->input->post('submit')) {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("quantity", "Quantity", "trim|required|greater_than[0]");
        
                if ($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('errors', validation_errors());
                    redirect('/');
                } else {
                    $product_name = $this->input->post('submit');
                    $quantity = $this->input->post('quantity');
                    
                    $this->load->model('Product');
                    $this->Product->add_product($product_name, $quantity);
                    $this->session->set_flashdata('success', 'Product successfully added to cart.');
                    redirect('/products/catalog');
                }
            } else {
                redirect('/');
            }
        }
        public function delete($id) {
            if($this->input->post('submit') == 'remove') {
                $this->load->model('Product');
                $this->Product->delete_item($id);
                $this->session->set_flashdata('errors', 'Item successfully removed from the cart.');
                redirect('/products/cart');
            } else {
                redirect('/products/cart');
            }
            
        }
        public function billing() {
            if($this->input->post('submit') == 'billing') {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("billing_name", "Billing name", "trim|required");
                $this->form_validation->set_rules("billing_address", "Billing address", "trim|required");
                $this->form_validation->set_rules("card_number", "Card number", "trim|required|numeric|min_length[13]");
        
                if ($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('billing_errors', validation_errors());
                    redirect('/products/cart');
                } else {
                    $total_amount = $this->input->post('total_amount');
                    $billing_name = $this->input->post('billing_name');
                    $billing_address = $this->input->post('billing_address');
                    $card_number = $this->input->post('card_number');
                    $ending_number = substr($card_number, -4);
                    
                    $this->session->set_flashdata('billing_name', $billing_name);
                    $this->session->set_flashdata('billing_address', $billing_address);
                    $this->session->set_flashdata('ending_number', $ending_number);
                    $this->session->set_flashdata('total_amount', $total_amount);
                    $this->session->set_flashdata('summary_success', 'Your order has been successfully placed. Thank you for shopping with us!');
                    $this->load->model('Product');
                    $this->Product->delete_cart();
                    $this->load->view('order_summary');
                }
            } else {
                redirect('/products/cart');
            }
        }
    }
?>