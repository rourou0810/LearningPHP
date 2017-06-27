<?php  
	if ($_COOKIE["isLogin"]) {
		echo "你好：".$_COOKIE["username"]."&nbsp;&nbsp;";
		echo "<a href='login.php?action=logout'>退出</a>";
	}else{
		header("Location:login.php");
		exit;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>主页</title>
</head>
<body>
	<p>主体内容</p>
</body>
</html>