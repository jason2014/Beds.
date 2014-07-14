<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    private $data = array(
        'title' => '湖北工业大学宿舍管理'
    );
    
	public function index() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
	}

    // super admin distribute rooms to college
	public function colleges() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/college');
        $this->load->view('templates/footer');
	}

    // college admin distribute rooms to class
	public function classes() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
	}
}
