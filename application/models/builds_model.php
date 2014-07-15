<?php

class Builds_model extends Base_Model {
    public function set_build($data){
        /* data (
           name
           type
           locate
           mark
           )
        */
        $exist = $this->get_builds($data['name']);
        if($exist)
            return FALSE;
        return $this->db->insert('builds', $data);
    }

    public function get_builds($name = NULL){
        if($name === NULL){
            $query = $this->db->get('builds');
            return $query->result_array();
        }

        $query = $this->db->get_where('builds', array('name' => $name));
        return $query->row_array();
    }
}
