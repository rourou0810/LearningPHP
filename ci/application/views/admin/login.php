<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8" />
    <title>Laoyang工作室 | 你的技术中心</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/icon.png">
	<link rel="stylesheet" href="<?php echo base_url('resource/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('resource/css/matrix-login.css'); ?>" />
    <link href="<?php echo base_url('resource/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/css/login.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resource/js/login.js'); ?>"></script>

</head>
    <body>
        <div id="loginbox">            
            <form action="<?php echo base_url('index.php/login/index'); ?>" method="post" id="loginform" class="panel panel-default">
                <div class="panel-heading row">
                    <div class="col-md-6">
                        <img src="<?php echo base_url('resource/images/logo.png'); ?>" width="100%" style="margin-top:8px;">
                    </div>
                    <div class="col-md-6">
                        <span>后台管理系统</span>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="control-group"> 
                        <div class="controls">
                            <div class="errortip"><?php if(!empty($errorMsg)) echo $errorMsg; ?></div>
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" placeholder="用户名" id="username">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="errortip"></div>
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="密&nbsp;&nbsp;&nbsp;码" id="pwd" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                     <div class="form-actions">
                        <span class="pull-right"><button id="submit" type="submit" href="javascript:;" class="btn btn-success" /> 登录</button></span>
                    </div>
                 </div>
            </form>
        </div>
    </body>

</html>
