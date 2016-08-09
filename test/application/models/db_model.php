<?php

class db_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function get_posts() {
        $this->db->select("*"); 
        $this->db->from('test');
        $query = $this->db->get();
        
        return $query->result();
    }
    
     public function get_post($message_id = null) {
        $this->db->select("*"); 
        $this->db->where('ID', $message_id);
        $this->db->from('test');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function form_insert($data = null) {
        $this->db->insert('test', $data);
    }
    
    public function form_delete($message_id = null) {
        $this->db->where('ID', $message_id);
        $this->db->delete('test');
    }
    
     public function form_update($message_id = null, $data = null) {
        $this->db->where('ID', $message_id);
        $this->db->update('test', $data);
    }
    
    public function search( $keyword = null ) {
        $this->db->like('subject', $keyword);
        $this->db->or_like('message', $keyword);
    }
    
 
}