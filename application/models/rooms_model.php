<?php

class Rooms_model extends Base_Model {
    public function set_room($data){
        /* data (
           build_name
           mark
           )
        */
        $this->load->model('builds_model');
        $build = $this->builds_model->get_builds($data['build_name']);
        unset($data['build_name']);
        $data['build_id'] = $build['id'];

        $exist = $this->get_rooms($data['build_id'], $data['mark']);
        if($exist)
            return FALSE;
        $this->db->insert('rooms', $data);
    }

    public function get_rooms($build_id = NULL, $mark = NULL){
        if($build_id === NULL && $mark === NULL){
            $query = $this->db->get('rooms');
            return $query->result_array();
        }

        $query = $this->db->get_where(
            'rooms',
            array(
                'build_id' => $build_id,
                'mark' => $mark
            ));

        return $query->row_array();
    }

}