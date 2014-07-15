<?php

class Beds_model extends Base_Model {

    public function set_bed($data){
        /* data (
           build_name
           room_mark  ==> to get room id
           mark
           )
        */
        $this->load->model('builds_model');
        $build = $this->builds_model->get_builds($data['build_name']);
        $this->load->model('rooms_model');
        $room = $this->rooms_model->get_rooms($build['id'], $data['room_mark']);
        
        unset($data['build_name']);
        unset($data['room_mark']);

        $data['room_id'] = $room['id'];
        $exist = $this->get_beds($data['room_id'], $data['mark']);
        if($exist)
            return FALSE;
        $this->db->insert('beds', $data);
    }

    public function get_beds($room_id = NULL, $mark = NULL){
        if($room_id === NULL && $mark === NULL){
            $query = $this->db->get('beds');
            return $query->result_array();
        }

        $query = $this->db->get_where(
            'beds',
            array(
                'room_id' => $room_id,
                'mark' => $mark
            ));

        return $query->row_array();
    }
}