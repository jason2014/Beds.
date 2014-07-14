<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    private $data = array(
        'title' => '湖北工业大学宿舍管理'
    );
    
	public function index() {
        $this->load->view('templates/header', $this->data);
        $this->load->view('login/index');
        $this->load->view('templates/footer');
	}
}
