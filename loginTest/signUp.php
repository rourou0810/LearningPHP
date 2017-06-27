<?php 
	
	header("Content-Type:text/html;charset=utf-8");
	//用户注册

	function connectMysql($dbhost, $dbuser, $dbpwd, $dbname) {
		//连接数据库
		$conn = mysqli_connect($dbhost, $dbuser, $dbpwd);
		//防止中文乱码
		mysqli_set_charset($conn, "utf8");
		//mysqli_query($conn , "set names utf8");
		//选择数据库
		mysqli_select_db($conn, $dbname);

		return $conn;
	}

	$conn = connectMysql("localhost:3306", "root", "", "users");

	$username = $_POST["username"];
	$pwd      = $_POST["password"];
	$email    = $_POST["email"];
	
	//判断用户名、密码、邮箱是否设置
	if(empty($username) && empty($pwd) && empty($email)){
		exit();
	}

	//插入数据之前先验证用户名或邮箱是否被注册
	$sql = "SELECT * FROM userlist WHERE username='".$username."' OR email='".$email."'";
	$result = mysqli_query($conn, $sql);


	if(mysqli_num_rows($result) == 0){

		//插入前台页面提交的用户数据
		$sql = "INSERT INTO userlist(username,password,email) VALUES ('".$username."','".$pwd."','".$email."')";
		$result = mysqli_query($conn, $sql);
		if(!$result) {
			die("无法插入数据".mysqli_error($result));
		}
		echo "数据插入成功";
	}else{
		while($row = mysqli_fetch_assoc($result)){
			if($username == $row["username"]){
				echo "此用户名已被注册！";
			}else if ($email == $row["email"]){
				echo "此邮箱已被注册！";
			}
		}
	}
	
	//释放内存
	//mysqli_free_result($result);

	//断开数据库
	mysqli_close($conn);

?>