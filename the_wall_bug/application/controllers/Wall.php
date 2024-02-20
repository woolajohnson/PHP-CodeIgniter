<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller {

    /*  DOCU: This function is triggered by default to render the Wall page.
        This loads all messages with comments from all users.
        Owner: Karen
    */
    public function index()  
    {
        $this->load->model('Message');
        $user_messages = $this->message->get_messages();
        
        $inbox = array();
        foreach($user_messages as $user_message) 
        {
            $this->load->model('Comment');
            $comments = $this->Comment->get_comments_from_message_id($user_message['message_id']);
            $user_message["comments"] = $comments;
            $inbox[] = $user_message;
        }
        $param = array("first_name"=>$this->session->userdata('first_name'), "inbox"=>$inbox);
  
        $this->load->view('wall/show',$param);
    }

    /*  DOCU: This function is responsible to validate and add the message from any user to the database.
        Owner: Karen
    */
    public function add_message() 
    {
        $this->load->model('Message');
        $result = $this->Message->validate_message();
        
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
        } 
        else {
            $message = $this->input->post('message_input');
            $this->load->model('Message');
            $this->Message->add_message($message);
        }
        redirect("wall");
    }

    /*  DOCU: This function is responsible to validate and add the comment from any user to the database.
        Owner: Karen
    */
    public function add_comment() 
    {
        $this->load->model('Comment');
        $result = $this->Comment->validate_comment();

        if($result != 'success') {
            $this->session->set_flashdata('input_errors', validation_errors());
        }
        else {
            $message_id = $this->input->post('message_id');
            $comment = $this->input->post('comment_input');
            $this->Comment->add_comment($message_id, $comment);
        }
        redirect("wall");
    }
}