<!DOCTYPE html>
<html lang="en">
<head>
<title>Laoyang工作室 | 你的技术中心</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="images/icon.png">
<link rel="stylesheet" href="<?php echo base_url('resource/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('resource/css/bootstrap-responsive.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('resource/css/fullcalendar.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('resource/css/matrix-style.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('resource/css/matrix-media.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/css/uniform.css'); ?>">
<link href="<?php echo base_url('resource/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url('resource/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('resource/ueditor/ueditor.config.js'); ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('resource/ueditor/ueditor.all.min.js'); ?>"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('resource/ueditor/lang/zh-cn/zh-cn.js'); ?>"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index.html">LAO YANG</a></h1><span>后台管理系统</span>
</div>
<!--close-Header-part--> 

<div id="loginmsg">
  <h5><?php echo $name; ?>，欢迎您登录LaoYang工作室后台管理系统！</h5>
</div>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse" style="min-height:43px;">
  <ul class="nav">
    <li id="logout" class="" style="background-color: #2E363F;">
      <a href="<?php echo base_url('index.php/logout/index') ?>"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a>
    </li>
  </ul>
</div>

