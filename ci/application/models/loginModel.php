<?php

	class LoginModel extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function getUser($uname,$pwd)
		{
			$query = $this->db->query("SELECT * FROM user WHERE username='".$uname."' AND password='".$pwd."'");
			$data  = $query->result();

			return $data;
		}
	}