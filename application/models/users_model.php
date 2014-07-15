<?php

class Users_model extends Base_Model {

    public function set_user($data){
        /* data (
           type
           username
           password
           name
           college_name  -- get college_id 
           class_name -- get class_id
           )
        */
        $this->load->model('colleges_model');
        $college = $this->colleges_model->get_colleges($data['college_name']);
        $this->load->model('classes_model');
        $class = $this->classes_model->get_classes($data['class_name']);

        unset($data['college_name']);
        unset($data['class_name']);

        $data['college_id'] = $college['id'];
        $data['class_id'] = $class['id'];        

        $exist = $this->get_users($data['username']);
        if($exist)
            return FALSE;
        $this->db->insert('users', $data);
    }

    public function get_users($username = NULL){
        if($username === NULL){
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

}