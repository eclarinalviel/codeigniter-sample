<?php


class Contact extends CI_Controller {
    
	public function __construct() {
            parent::__construct();
            $this->load->model('db_model');
            $this->load->helper('form');
            $this->load->library('session');
        }
	public function index($data = null) {
            
            $data['messages'] = $this->db_model->get_posts();
            $this->load->view('layout/main', $data);
            
	}

	public function new_message() {
            
            $message_id = $this->input->post('message_id');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            
            if ( $this->session->has_userdata('logged_in') ) {
                $user = $_SESSION['logged_in']; 
                
                if ( !isset($message_id) || empty($message_id) ) { // on insert
                    $data = array(
                        'subject' => $subject,
                        'message' => $message,
                        'sender' => $user['username'],
                        'status' => 1,
                    );

                    $this->db_model->form_insert($data);
                    $data['success'] = 'Data Inserted Successfully';

                } else { // on update

                    $message_id = $this->input->post('message_id');

                    $data = array(
                        'subject' => $subject,
                        'message' => $message,
                    );
                    $this->db_model->form_update($message_id, $data);
                    $data['success'] = 'Data Updated Successfully';
                }
            }
            $data['error'] = 'YOU NEED TO LOGIN FIRST!';
            
            $this->index($data);
	}
        
        public function delete() {
            
            if ( $this->input->post('action') == "delete" ) {
                $message_id = $this->input->post('message_id');
                $this->db_model->form_delete($message_id);

                $data['success'] = 'Data Deleted Successfully';

                $this->index($data);
            } else {
                
                $this->update();
            }
            
        }
        
        public function update() {
         
            $message_id = $this->input->post('message_id');
            $data['msg'] = $this->db_model->get_post($message_id);

            $this->index($data);
            
        }



}