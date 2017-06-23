<?php
	function table($tableName,$rows,$cols) {
		$str_table  = "";
		$str_table .= "<table align='center' border='1' width='600'>";
		$str_table .= "<caption><h3> $tableName </h3></caption>";

		for( $out=0; $out<$rows; $out++) {
			if( $out%2 == 0){
				$bgcolor = "#fff";
			}else{
				$bgcolor = "#ddd";
			}

			$str_table .= "<tr bgcolor=".$bgcolor.">";
			for( $in=0; $in<$cols; $in++) {
				$str_table .= "<td>".($out*$cols+$in)."</td>";
			}

			$str_table .= "</tr>";
		}

		$str_table .= "</table>";

		return $str_table;
	}

	$str = table("3行4列的表格",3,4);
	echo $str;

	$a=false;
	if(empty($a)){
		echo "null";
	}else{
		echo "have value";
	}


?>