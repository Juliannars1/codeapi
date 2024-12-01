<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup_model extends CI_Model {
    
    private $table = 'popup_configurations';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_latest_configuration() {
        $query = $this->db->order_by('created_at', 'DESC')
                         ->limit(1)
                         ->get($this->table);
        
        return $query->row_array();
    }

    public function save_configuration($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        // Ensure JSON fields are properly encoded
        $data['style'] = is_string($data['style']) ? $data['style'] : json_encode($data['style']);
        $data['conditions'] = is_string($data['conditions']) ? $data['conditions'] : json_encode($data['conditions']);
        
        return $this->db->insert($this->table, $data);
    }

    public function update_configuration($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        // Ensure JSON fields are properly encoded
        $data['style'] = is_string($data['style']) ? $data['style'] : json_encode($data['style']);
        $data['conditions'] = is_string($data['conditions']) ? $data['conditions'] : json_encode($data['conditions']);
        
        return $this->db->where('id', $id)
                       ->update($this->table, $data);
    }
}