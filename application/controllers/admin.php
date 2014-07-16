<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    private $data = array(
        'title' => '湖北工业大学宿舍管理'
    );

    public function __construct(){
        parent::__construct();
        $this->data['uri'] = str_replace('/', '-', $this->uri->uri_string());
    }
    
	public function index() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
	}

    // super admin distribute rooms to college
	public function colleges() {

        $this->load->model('colleges_model', 'colleges');
        $this->data['colleges'] = $this->colleges->get_colleges();

        $this->load->model('builds_model', 'builds');
        $tmp = $this->builds->get_storey();
        $storeys = array();
        foreach($tmp as $tt) {
            foreach($tt['storey'] as $t){
                $t['build_id'] = $tt['build_id'];
                $t['build_name'] = $tt['build_name'];
                $t['build_type'] = $tt['build_type'];                                
                $storeys[] = $t;
            }
        }
        $this->data['storeys'] = $storeys;

        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/college', $this->data);
        $this->load->view('templates/footer');
	}

    // college admin distribute rooms to class
	public function classes() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
	}
}
