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

    public function get_storey() {

        $query = $this->db->query("select id as build_id, name as build_name, type as build_type from builds order by type;");
        $result = $query->result_array();

        foreach($result as $k => $r) {
            $build_id = $r['build_id'];
            $query2 = $this->db->query("select storey, count(id) as total_rooms, sum(bed_count) as total_beds from rooms where build_id = $build_id and college_id = 0 group by storey order by storey");
            $result2 = $query2->result_array();

            if($r['build_type'] == 0)
                $result[$k]['build_type'] = '女';
            else
                $result[$k]['build_type'] = '男';
            $result[$k]['storey'] = $result2;
        }
        return $result;
    }

}
