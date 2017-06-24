<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>PHP连接MySQL数据库</title>
</head>
<body>

<?php  
	//连接数据库
	$dbhost = "localhost:3306";		//mysql服务器主机地址
	$dbuser = "root";				//mysql用户名
	$dbpass = "";					//mysql用户密码

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

	if(!$conn) {
		die("连接错误:".mysqli_error($conn));
	}

	echo "数据库连接成功！<br>";

	// 设置编码，防止中文乱码
	mysqli_query($conn , "set names utf8");

	//----------------------------------------------------------
	//删除数据库
	$sql = "DROP DATABASE RUNOOB";
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
		die("删除数据库失败：".mysqli_error($conn));
	}
	echo "数据库 RUNOOB 删除成功<br>";

	//----------------------------------------------------------
	//创建数据库
	$sql = "CREATE DATABASE RUNOOB";
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
		die("创建数据库失败：".mysqli_error($conn));
	}
	echo "数据库 RUNOOB 创建成功<br>";

	//----------------------------------------------------------
	//选择数据库
	mysqli_select_db($conn, "RUNOOB");

	//创建数据表
	$sql = "CREATE TABLE runoob_tbl(".
			 "runoob_id INT NOT NULL AUTO_INCREMENT,".
			 "runoob_title VARCHAR(100) NOT NULL,".
			 "runoob_author VARCHAR(40) NOT NULL,".
			 "submission_date DATE,".
			 "PRIMARY KEY (runoob_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$retval = mysqli_query($conn, $sql);

	if(!$retval) {
		die("数据表创建失败：".mysqli_error($conn));
	}

	echo "数据表创建成功<br>";

	//----------------------------------------------------------
	//插入表数据
	$sql = "INSERT INTO runoob_tbl".
			"(runoob_title, runoob_author, submission_date)".
			"VALUES".
			"('学习PHP','php.net','2017-06-24'),('学习MYSQL','菜鸟教程','2017-06-24')";
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
		die("无法插入数据".mysqli_error($conn));
	}
	echo "数据插入成功<br>";

	//----------------------------------------------------------
	//查询表数据
	//$sql = "select * from runoob_tbl";
	$sql = "select runoob_id, runoob_title, runoob_author, submission_date from runoob_tbl";
	$retval = mysqli_query($conn, $sql);
	if(! $retval ){
    	die('无法读取数据: ' . mysqli_error($conn));
	}
	echo "<h2>菜鸟教程mysqli_fetch_array测试</h2>";
	echo "<table border='1'><tr><td>教程ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>";

	//可以使用常量 MYSQL_NUM 作为 PHP mysqli_fetch_array() 函数的第二个参数，返回数字数组
	while($row = mysqli_fetch_array($retval,MYSQL_NUM)){
		echo "<tr><td>{$row[0]}</td>".
			 "<td>{$row[1]}</td>".
			 "<td>{$row[2]}</td>".
			 "<td>{$row[3]}</td></tr>";
	}
	echo "</table>";

	// mysqli_fetch_assoc(), 该函数从结果集中取得一行作为关联数组
	/*while($row = mysqli_fetch_assoc($retval))
	{
	    echo "<tr><td> {$row['runoob_id']}</td> ".
	         "<td>{$row['runoob_title']} </td> ".
	         "<td>{$row['runoob_author']} </td> ".
	         "<td>{$row['submission_date']} </td> ".
	         "</tr>";
	}*/

	//----------------------------------------------------------
	//用where语句查询数据
	$sql = "select * from runoob_tbl where runoob_author='菜鸟教程'";
	//使用BINARY 关键字来设定 WHERE 子句，查询条件区分大小写。
	//$sql = "select * from runoob_tbl where BINARY runoob_author='菜鸟教程'";
	$retval = mysqli_query($conn, $sql);
	if(! $retval ){
    	die('无法读取数据: ' . mysqli_error($conn));
	}
	echo "<h2>菜鸟教程mysqli_fetch_array测试</h2>";
	echo "<table border='1'><tr><td>教程ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>";

	//可以使用常量 MYSQL_NUM 作为 PHP mysqli_fetch_array() 函数的第二个参数，返回数字数组
	while($row = mysqli_fetch_array($retval,MYSQL_ASSOC)){
		echo "<tr><td> {$row['runoob_id']}</td> ".
	         "<td>{$row['runoob_title']} </td> ".
	         "<td>{$row['runoob_author']} </td> ".
	         "<td>{$row['submission_date']} </td> ".
	         "</tr>";
	}
	echo "</table>";


	//----------------------------------------------------------
	//删除数据表
	// $sql = "DROP TABLE runoob_tbl";
	// $retval = mysqli_query($conn, $sql);

	//----------------------------------------------------------
	// 释放内存
	mysqli_free_result($retval);
	//关闭数据库连接
	mysqli_close($conn);	
	
?>

</body>
</html>