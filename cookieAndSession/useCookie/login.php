<?php 	

	function clearCookie() {//清除cookie
		setcookie("username","",time()-3600);
		setcookie("isLogin","",time()-3600);
	}

	if (isset($_GET["action"]) && $_GET["action"] == "login") {
		clearCookie();

		if ($_POST["username"] == "admin" && $_POST["password"] == "123456") {
			setcookie("username",$_POST["username"],time()+60*60*24*7);
			setcookie("isLogin","1",time()+60*60*24*7);
			header("Location:index.php");
		}else{
			die("用户名或密码错误！");
		}
	}else if(isset($_GET["action"]) && $_GET["action"] == "logout") {
		clearCookie();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>登录页</title>
</head>
<body>
	<h1>用户登录</h1>
	<form action="login.php?action=login" method="post">
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