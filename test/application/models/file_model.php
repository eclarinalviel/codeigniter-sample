<?php

class file_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function get_image( $user_id = null ) {
        $this->db->select("file");
        $this->db->where('user_id', $user_id);
        $this->db->from('users');
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function add_image( $user_id = null, $data = null ) {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }
   
 
}