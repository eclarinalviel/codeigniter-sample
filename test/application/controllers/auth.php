<?php

class Auth extends CI_Controller {
    
	public function __construct() {
            parent::__construct();

        }

        public function login() {
            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            $result = $this->auth_model->login($username, $password);
            $data['messages'] = $this->db_model->get_posts();
            $data['success'] = 'Logged in Successfully';

            if ( isset($result) && !empty($result) ) {
                $session_data = array(
                    'ID' => $result->user_ID,
                    'username' => $result->username,
                    'password' => $result->password,
                    'logged_in' => TRUE
                );
            }
            
            $this->session->set_userdata('logged_in', $session_data);
            $this->load->view('layout/main', $data);
        }
        
        public function signup() {
            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            $data = array(
                'username' => $username,
                'password' => $password,
                'status' => 1,
            );

            $this->auth_model->signup($data);
            $data['success'] = 'Registered Successfully';

            $data['messages'] = $this->db_model->get_posts();
            $this->load->view('layout/main', $data);
        }

        public function logout() {
            
            $this->session->unset_userdata('logged_in');
            
            $data['messages'] = $this->db_model->get_posts();
            $this->load->view('layout/main', $data);
        }
}