<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" type="text/css" href="/public/layout.css">
  <script src="/public/jquery.min.js" type="text/javascript"></script>
</head>
<body id="<?=$uri?>">
<div class="header">
  <ul>
     <li><a href="#">管理</a>
       <ul>
         <li><a href="/admin/colleges">分配宿舍至各学院</a></li>
         <li><a href="/admin/classes">分配床位至各班级</a></li>
       </ul>
     </li>
     <li><a href="#">学生选宿舍</a></li>
     <li><a href="/">关于</a></li>
 </ul>
</div>
<div class="content">     