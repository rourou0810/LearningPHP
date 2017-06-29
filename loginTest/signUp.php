<?php 
	
	header("Content-Type:text/html;charset=utf-8");

	class Connmysql {
		private $dbhost;
		private $dbuser;
		private $dbpwd;
		private $dbname;

		function __construct($dbhost, $dbuser, $dbpwd, $dbname) {
			$this->dbhost = $dbhost;
			$this->dbuser = $dbuser;
			$this->dbpwd  = $dbpwd;
			$this->dbname = $dbname;
		}

		public function connectMysql() {
			$conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd);
			mysqli_set_charset($conn, "utf8");
			mysqli_select_db($conn, $this->dbname);
			return $conn;
		}
	}

	class Checkresult{

		private $username;
		private $pwd;
		private $email;

		function __construct($username, $pwd, $email) {
			$this->username = $username;
			$this->pwd      = $pwd;
			$this->email    = $email;
		}

		public function checkData($conn) {
			
			if(empty($this->username) && empty($this->pwd) && empty($this->email)){
				exit();
			}

			$sql = "SELECT * FROM userlist WHERE username='".$this->username."' OR email='".$this->email."'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				if($this->username == $row["username"]){
					echo "此用户名已被注册过！";
				}
				exit();	
			}

			$sql = "INSERT INTO userlist(username,password,email) VALUES ('".$this->username."','".$this->pwd."','".$this->email."')";
			$result = mysqli_query($conn, $sql);
			if(!($result)) {
				die("无法插入数据".mysqli_error($result));
			}
			echo "插入成功！";
		}
	}

	$connsql = new Connmysql("localhost:3306", "root", "", "users");
	$conn = $connsql->connectMysql();

	$checkresult = new Checkresult($_POST["username"], $_POST["password"], $_POST["email"]);
	
	$checkresult->checkData($conn);
	


	//释放内存
	//mysqli_free_result($result);

	//断开数据库
	mysqli_close($conn);

?>