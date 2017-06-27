<?php  

	session_start();//开启session，并创建一个新的session id保存在客户端的cookie中
	require "connect.inc.php"; //引入连接数据库的文件

	if (isset($_GET["action"]) && $_GET["action"] == "login") {
		$username = $_POST["username"];
		$userpwd  = $_POST["password"];

		$sql = "select * from user where username='".$username."'and userpwd='".$userpwd."'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION["username"] = $username;//将用户登录的名称变量注册到session中
			$_SESSION["userid"]   = $row["id"];
			$_SESSION["islogin"]  = 1;
			header("Location:index.php");
		}else{
			echo "<p style='color:red'>用户名或密码错误！</p>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>邮件系统登录</title>
</head>
<body>
	<p>欢迎光临邮箱系统</p>
	<p>Session ID:<?php echo session_id(); ?></p>
	<form action="maillogin.php?action=login" method="post">
		<div>
			<span>用户名：</span>
			<input type="text" name="username" size="25">
		</div>
		<br>	
		<div>
			<span>密&nbsp;码：</span>
			<input type="password" name="password" size="25">
		</div>
		<br>	
		<div>
			<input type="submit" value="登录">
			<input type="reset" value="重置">
		</div>
	</form>
</body>
</html>