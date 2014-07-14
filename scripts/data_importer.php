<?php

setlocale(LC_ALL,'zh_CN');

echo "start script \n";
$csv_array = array();

$file_path = 'bb.csv';
$delimiter = ',';

if (($handle = fopen($file_path, 'r')) !== false) {
    $line_num = 0;

    while (($date = fgetcsv($handle, 0, $delimiter)) !== false) {
    }
    fclose($handle);
}
/*
床位名称,考试号,年份,标记,学院代码,学院名称,班级号,班级,性别,住宿费,区域,栋数,楼层房号,床位号,EXT1,EXT2,EXT3,EXT4,EXT5,EXT6
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

function insert($data){
    
}

echo "finish script \n";