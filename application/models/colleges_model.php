<?php
class Colleges_model extends Base_Model {

    public function set_college($data){
        // insert if college name is not exist
        $exist = $this->get_colleges($data['name']);
        if($exist)
            return FALSE;
        return $this->db->insert('colleges', $data);
    }

    public function get_colleges($name = NULL){
        if($name === NULL){
            $query = $this->db->get('colleges');
            return $query->result_array();
        }

        $query = $this->db->get_where('colleges', array('name' => $name));
        return $query->row_array();
    }
}
