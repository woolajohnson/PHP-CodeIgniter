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
            $result_cart = $this->Product->view_cart();
            $data['result'] = $result_cart[0];
            $data['total_amount'] = $result_cart[1];
            $this->load->view('cart', $data);
        }
        public function add_cart() {
            if ($this->input->post('submit')) {
                $this->load->model('Product');
                $result = $this->Product->validate_catalog();
        
                if ($result == "valid") {
                    $product_name = $this->security->xss_clean($this->input->post('submit'));
                    $quantity = $this->security->xss_clean($this->input->post('quantity'));
                    
                    $this->load->model('Product');
                    $this->Product->add_product($product_name, $quantity);
                    $this->session->set_flashdata('success', 'Product successfully added to cart.');
                    redirect('/products/catalog');
                } else {
                    $this->session->set_flashdata('errors', $result);
                    redirect('/products/cart');
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
                $this->load->model('Product');
                $result = $this->Product->validate_billing();
        
                if ($result === 'valid') {
                    $this->load->model('Product');
                    $data['result'] = $this->Product->cart_count();
                    if(empty($data['result'])) {
                        $this->session->set_flashdata('billing_errors', 'Your cart is empty!');
                        redirect('/products/cart');
                    } else {
                        $this->load->model('Product');
                        $total_amount = $this->Product->total_amount();
                        $billing_name = $this->security->xss_clean($this->input->post('billing_name'));
                        $billing_address = $this->security->xss_clean($this->input->post('billing_address'));
                        $card_number = $this->security->xss_clean($this->input->post('card_number'));
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
                    $this->session->set_flashdata('billing_errors', $result);
                    redirect('/products/cart');
                }
            } else {
                redirect('/products/cart');
            }
        }
    }
?>