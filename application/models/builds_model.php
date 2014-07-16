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
        $this->db->insert('builds', $data);
    }

    public function get_builds($name = NULL){
        if($name === NULL){
            $query = $this->db->get('builds');
            return $query->result_array();
        }

        $query = $this->db->get_where('builds', array('name' => $name));
        return $query->row_array();
    }

    public function get_empty_rooms($type = 1) {
        $query = $this->db->query("select concat(b.name, '-', b.id) as name, r.mark as mark from builds b join rooms r on (b.id = r.build_id) where b.type = $type order by b.name;");
        $result = $query->result_array();

        $return = array();
        foreach($result as $r) {
            if(!isset($return[$r['name']])){
                $return[$r['name']] = array();
            }
            $return[$r['name']][] = $r['mark'];            
        }
        return $return;
    }
}
