<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('colleges_model');
    }
    
    public function data_importer(){
        
        echo "start script".PHP_EOL;
        $delimiter = ',';
        $csv = FCPATH.'scripts/bb.csv';

        if (($handle = fopen($csv, 'r')) !== false) {
            $row_num = 0;
            while (($data = fgetcsv($handle, 0, $delimiter)) !== false) {
                echo "processing row $row_num".PHP_EOL;
                $this->insert($data);//die();
                $row_num++;
            }
            fclose($handle);
        }

        echo "finish script".PHP_EOL;        
    }
    
    /*
      床位代码, 床位名称,考试号,年份,标记,学院代码,学院名称,班级号,班级,性别,住宿费,区域,栋数,楼层房号,床位号,EXT1,EXT2,EXT3,EXT4,EXT5,EXT6
      array(21) {
      [0]=>
      床位代码(17) "13103211131012075"
      [1]=>
      床位名称(30) "中西北区 01栋 207室 5床"
      [2]=>
      考试号(0) ""
      [3]=>
      年份(4) "2014"
      [4]=>
      标记(1) "0"
      [5]=>
      学院代码(2) "03"
      [6]=>
      学院名称(9) "计算机"
      [7]=>
      班级号(8) "13103211"
      [8]=>
      班级(9) "13软件1"
      [9]=>
      性别(1) "1"
      [10]=>
      住宿费(1) "3"
      [11]=>
      区域(1) "1"
      [12]=>
      栋数(2) "01"
      [13]=>
      楼层房号(3) "207"
      [14]=>
      床位号(1) "5"
      [15]=>
      EXT1(0) ""
      [16]=>
      EXT2(0) ""
      [17]=>
      EXT3(0) ""
      [18]=>
      EXT4(0) ""
      [19]=>
      EXT5(0) ""
      [20]=>
      EXT6(0) ""
      }
    */

    private function insert($data){
        // colleges, classes & users data
        $this->load->model('news_model');
        $this->colleges_model->set_college(array('name' => $data[6]));
        
        $this->load->model('classes_model');
        $this->classes_model->set_class(array(
            'college_name' => $data[6],
            'name' => $data[8]
        ));

        $this->load->model('users_model');
        $this->users_model->set_user(array(
            'type' => $data[9],
            'username' => $data[2],
            'password' => $data[2],
            'name' => $data[2],
            'college_name' => $data[6],
            'class_name' => $data[8],
        ));
        // builds, rooms & beds data
        $this->load->model('builds_model');
        $part = explode(' ', $data[1]);

        $name = $part[0]. $part[1];
        $locate = $part[0];
        $mark = substr($data[0], -7, 3);
        
        $this->builds_model->set_build(array(
            'name' => $name,
            'type' => $data[9],
            'locate' => $locate,
            'mark' => $mark
        ));

        $this->load->model('rooms_model');
        $this->rooms_model->set_room(array(
            'build_name' => $name,
            'mark' => $data[13]
        ));

        $this->load->model('beds_model');
        $this->beds_model->set_bed(array(
            'build_name' => $name,
            'room_mark' => $data[13],
            'type' => $data[10],
            'mark' => $data[14]
        ));
        
    }
}