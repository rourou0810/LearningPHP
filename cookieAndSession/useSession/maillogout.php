<?php  

	session_start();
	$username = $_SESSION["username"];
	$_SESSION = array();//删除所有session变量

	if (isset($_COOKIE[session_name()])) {//判断是否使用基于cookie的session
		setcookie(session_name(), "", time()-42000, "/");//删除包含sessionID的cookie
	}

	session_destroy();//彻底销毁session

?>

<!DOCTYPE html>
<html>
<head>
	<title>退出系统</title>
</head>
<body>
	<p><?php echo $username; ?></p>
	<p><a href="maillogin.php">重新登陆邮件系统</a></p>
</body>
</html>