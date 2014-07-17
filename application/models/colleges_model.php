<?php
class Colleges_model extends Base_Model {

    public function set_college($data){
        // insert if college name is not exist
        $exist = $this->get_colleges($data['name']);
        if($exist)
            return FALSE;
        $this->db->insert('colleges', $data);
    }

    public function get_colleges($name = NULL){
        if($name === NULL){
            $query = $this->db->query("select c.*, r.type, sum(bed_count) as bed_count from colleges c left join (select room.*, b.type from rooms room join builds b on (room.build_id = b.id)) as r on (c.id = r.college_id) group by r.type, c.name order by c.id");
            $result = $query->result_array();

            $return = array();
            foreach($result as $r) {
                $return[$r['id']]['id'] = $r['id'];
                $return[$r['id']]['name'] = $r['name'];
                $return[$r['id']]['all_count'] = $r['all_count'];
                $return[$r['id']]['male_count'] = $r['male_count'];
                $return[$r['id']]['female_count'] = $r['female_count'];

                if($r['type'] == 0) {
                    $return[$r['id']]['has_female_bed'] = $r['bed_count'];                                
                } else if($r['type'] == 1) {
                    $return[$r['id']]['has_male_bed'] = $r['bed_count'];                                
                }

                if(!isset($return[$r['id']]['has_female_bed']))
                    $return[$r['id']]['has_female_bed'] = 0;
                if(!isset($return[$r['id']]['has_male_bed']))
                    $return[$r['id']]['has_male_bed'] = 0;
                
                $return[$r['id']]['has_all_bed'] = $return[$r['id']]['has_female_bed'] + $return[$r['id']]['has_male_bed'] ;
            }

            return $return;
        }

        $query = $this->db->get_where('colleges', array('name' => $name));
        return $query->row_array();
    }
}
