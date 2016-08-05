<?php


class Contact extends CI_Controller {
    
	public function __construct() {
            parent::__construct();
            $this->load->model('db_model');
        }
	public function index() {
            $this->load->view('layout/main');
	}

	public function new_message() {
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
//            var_dump($message);
            
            $data = array(
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'status' => 1,
            );
            
//           Transfer datas to model - Model->Function_Name
            $this->db_model->form_insert($data);
            
            $data['message'] = 'Data Inserted Successfully';
            
//            Load the View with data - Folder/Filename
            $this->load->view('layout/main', $data);
	}



}