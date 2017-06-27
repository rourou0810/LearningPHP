<?php  
	session_start();//使用cookie中现有的sessionID返回已经存在的session
	if ($_SESSION["islogin"]) {
		require "connect.inc.php";
		echo "<p>当前用户为：<b>".$_SESSION["username"]."</b></p>";
		echo "<div><a href='maillogout.php'>退出</a></div>";
	}else{
		header("Location:maillogin.php");
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>邮件系统</title>
</head>
<body>
	<?php  
		$userid = $_SESSION["userid"];

		$sql = "select * from mail where uid='".$userid."'";
		$result = $mysqli->query($sql);
		$mail_num = $result->num_rows;
		$mails = array();
		while ($row = $result->fetch_assoc()) {//遍历结果集获取登录用户的所有邮件
			$mails[] = $row;//将每次遍历的邮件都追加到$mails数组中
		}
	?>
	<p>你的邮箱中有<b><?php echo $mail_num; ?></b>邮件</p>
	<table border="0" cellspacing="0" cellpadding="0" width="380">
		<tr>
			<th>编号</th>
			<th>邮件标题</th>
			<th>接收时间</th>
		</tr>
		<?php 
			foreach ($mails as $mail) {
				echo "<tr align='center'><td>".$mail["id"]."</td><td>".$mail["mailtitle"]."</td><td>".date("Y-m-d H:i:s",$mail["maildt"])."</td><tr>";
			}
		?>
	</table>
</body>
</html>