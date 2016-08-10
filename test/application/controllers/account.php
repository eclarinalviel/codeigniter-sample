
<?php


class Account extends CI_Controller {
    
	public function __construct() {
            parent::__construct();
        }
	public function manage() {

            $user = $_SESSION['logged_in']; 
            $data['image'] = $this->file_model->get_image( $user['ID'] );
            
            if ( isset($data) ) {
                $this->load->view('layout/account', $data);
            } else {
                $this->load->view('layout/account');
            }

            
	}
        
        public function do_upload()
        {
            $user = $_SESSION['logged_in']; 
            $new_name = $user['ID'].'-'.$_FILES['userfile']['name'];

            $config['upload_path']          = './uploads/';
            $config['file_name']            = $new_name;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('layout/account', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $file = array(
                        'file' => $data['upload_data']['file_name']
                    );
                    $this->file_model->add_image($user['ID'], $file );
                    
                    $data['image'] = $this->file_model->get_image( $user['ID'] );
                    $this->load->view('layout/account', $data);
            }
        }
        
       

	
}