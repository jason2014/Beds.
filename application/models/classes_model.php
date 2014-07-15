<?php

class Classes_model extends Base_Model {
    public function set_class($data){
        /* data (
           name
           college id //get college id by college name
           )
        */
        $this->load->model('colleges_model');
        $college = $this->colleges_model->get_colleges($data['college_name']);
        unset($data['college_name']);
        $data['college_id'] = $college['id'];
        $exist = $this->get_classes($data['name']);
        if($exist)
            return FALSE;
        return $this->db->insert('classes', $data);
    }

    public function get_classes($name = NULL){
        if($name === NULL){
            $query = $this->db->get('classes');
            return $query->result_array();
        }

        $query = $this->db->get_where('classes', array('name' => $name));
        return $query->row_array();
    }

}