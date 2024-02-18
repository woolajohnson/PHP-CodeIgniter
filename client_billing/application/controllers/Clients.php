<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    /* Jump to the client_display method if this method is called or accessing the 
        base url or /clients */
	public function index()
	{
		$this->client_display();
	}
    /* Fetching data from Client model with display method and 
        passing the returned value to the index view */
    public function client_display()
	{
        $this->load->model('Client');
        $data['result'] = $this->Client->display();
		$this->load->view('index', $data);
	}
}