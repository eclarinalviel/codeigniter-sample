<?php


class Contact extends CI_Controller {
    
	public function __construct() {
            parent::__construct();
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
                        'sender' => $user['ID'],
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
                $this->index($data);
   
            }  else {
                $data['error'] = 'YOU NEED TO LOGIN FIRST!';
                $this->index($data);
            }

	}
        
        public function validate() {
            
            $session = $_SESSION['logged_in'];
            $logged_user = $session['ID'];
           
            $message_id = $this->input->post('message_id');
            $msg = $this->db_model->get_post($message_id);
            
            if ( $logged_user === $msg->sender ) {
                
                if ( $this->session->has_userdata('logged_in') ) {
                   $this->todo();
                   
                } else {
                    $data['error'] = 'YOU NEED TO LOGIN FIRST!';
                    $this->index($data);
                }
                
            } else {
                $data['error'] = 'YOU ARE NOT THE AUTHOR OF THIS POST !';
                $this->index($data);
            }
//           
        }
        
        public function update() {
         
            $message_id = $this->input->post('message_id');
            $data['msg'] = $this->db_model->get_post($message_id);

            $this->index($data);
            
        }
        
        public function search() {
        
            $keyword = $this->input->post('keyword');
            $data['messages'] = $this->db_model->search($keyword);

            $this->index($data);
            
        }
        
        public function todo() {
            if ( $this->input->post('action') == "delete" ) {
                $message_id = $this->input->post('message_id');
                $this->db_model->form_delete($message_id);

                $data['success'] = 'Data Deleted Successfully';

                $this->index($data);
            } else {

                $this->update();
            }
        }


}