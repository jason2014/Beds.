<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function distributebystorey() {

        $this->load->model('rooms_model', 'rooms');
        
        $return = array('status'=>'failure');
        
        if(isset($_REQUEST['key'], $_REQUEST['college'])) {
            $key = trim($_REQUEST['key'], ',');
            $college = $_REQUEST['college'];

            $parts = explode(',', $key);
            foreach($parts as $p){
                $b_s = explode('-', $p);
                $this->rooms->distribute_by_storey($college, $b_s[0], $b_s[1]);
            }
            $return['status'] = 'success';
         }

        echo json_encode($return);
	}
}
