<?php

/**
* 
*/
class UserModel
{
	
	public function getAllUsers()
	{
		$data = array(
					array('id'=>1, 'name'=>'Lucy', 'age'=>20),
					array('id'=>2, 'name'=>'XiaoMing', 'age'=>25),
					array('id'=>3, 'name'=>'Jake', 'age'=>22)
				);

		return $data;
	}
}