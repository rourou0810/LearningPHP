<?php  

	class ConnMysql {
		private $dbhost;
		private $dbuser;
		private $dbpwd;
		private $dbname;
		public  $conn;

		function __construct($dbhost, $dbuser, $dbpwd, $dbname) {
			$this->dbhost = $dbhost;
			$this->dbuser = $dbuser;
			$this->dbpwd  = $dbpwd;
			$this->dbname = $dbname;
		}

		public function connectMysql() {
			$this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd);
			mysqli_set_charset($this->conn, "utf8");
			mysqli_select_db($this->conn, $this->dbname);
		}

		public function queryMysql($tableName,$tableTitle,$keyName,$msg) {
			$sql = "SELECT * FROM ".$tableName." WHERE ".$tableTitle."='".$keyName."'";
			$result = mysqli_query($this->conn, $sql);
			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				if($keyName == $row[$tableTitle]){
					echo $msg;
				}
				exit();	
			}
		}

		public function insertInto($tableName,$tableTitle,$tableData) {
			$sql = "INSERT INTO ".$tableName."(".$tableTitle.") VALUES (".$tableData.")";
			$result = mysqli_query($this->conn, $sql);
			if(!($result)) {
				die("无法插入数据".mysqli_error($result));
			}
			echo "插入成功！";
		}

		function __destruct() {
			//断开数据库
			mysqli_close($this->conn);
		}
	}

?>