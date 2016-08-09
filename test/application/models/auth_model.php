<?php

class auth_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function login( $username = null, $password = null ) {
       $this->db->select("*"); 
       $this->db->where('username', $username);
       $this->db->where('password', $password);
       $this->db->from('users');
       $query = $this->db->get();
        
       return $query->row();
    }
    
    public function signup( $data = null ) {
       $this->db->insert('users', $data);
    }
    
    
 
}