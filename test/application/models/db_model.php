<?php

class db_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function form_insert($data) {
        $this->db->insert('test', $data);
    }
}