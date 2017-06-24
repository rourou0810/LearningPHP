<!DOCTYPE html>
<html>
<head>
	<title>数组</title>
</head>
<body>

<!-- --------------------------数 组--------------------------------------------------- -->

<h4>数组</h4>
<?php 
	// 1.索引数组
	$contact1 = array(1, "高某", "A公司", "北京市", "(010)89765432", "gao@php.com");

	// 2.关联数组
	$contact2 = array("ID"=>1, 
					  "姓名"=>"高某", 
					  "公司"=>"A公司", 
					  "地址"=>"北京市", 
					  "电话"=>"(010)89765432", 
					  "E-mail"=>"gao@php.com"
					);
	// 3.多维数组
	$contact3 = array(
		"市场部"=>array(
					array(1, "高某", "市场部经理", 5000),
					array(2, "咯某", "职员", 3000),
					array(3, "峰某", "职员", 2400)
				),
		"产品部"=>array(
					array(1, "高某", "产品部经理", 5000),
					array(2, "和某", "职员", 3000),
					array(3, "金某", "职员", 2400)
				),
		"财务部"=>array(
					array(1, "李某", "财务部经理", 5000),
					array(2, "才某", "职员", 3000),
					array(3, "霍某", "职员", 2400)
				)
		);

	echo $contact3["产品部"][0][2];
?>

<!-- --------------------------使用for循环遍历一维数组--------------------------------------------------- -->

<hr>
<h3>使用for循环遍历一维数组</h3>
<?php
	$contact = array(1, "高某", "A公司", "北京市", "(010)89765432", "gao@php.com");

	$str_table  = "";
	$str_table .= "<table align='center' border='1' width='600'>";
	$str_table .= "<caption><h3>联系人列表</h3></caption><tr bgcolor='#ddd'>";
	for ($i=0; $i <count($contact); $i++) { 
		$str_table .= "<td>".$contact[$i]."</td>";
	}
	$str_table .= "</tr></table>";
	echo $str_table;
?>

<!-- --------------------------使用for循环遍历二维数组--------------------------------------------------- -->

<hr>
<h3>使用for循环遍历二维数组</h3>
<?php
	$contact = array(
					array(1, "高某", "市场部经理", 5000),
					array(2, "咯某", "职员", 3000),
					array(3, "峰某", "职员", 2400)
				);

	$str_table  = "";
	$str_table .= "<table align='center' border='1' width='600'>";
	$str_table .= "<caption><h3>联系人列表</h3></caption>";
	for ($row=0; $row<count($contact); $row++) { 
		$str_table .= "<tr>";
		for ($col=0; $col<count($contact[$row]); $col++){
			$str_table .= "<td>".$contact[$row][$col]."</td>";
		}
		$str_table .= "</tr>";
	}
	$str_table .= "</table>";
	echo $str_table;
?>

<!-- --------------------------使用foreach循环遍历一维数组--------------------------------------------------- -->

<hr>
<h3>使用foreach循环遍历一维数组</h3>
<?php
	$contact = array("ID"=>1, 
					  "姓名"=>"高某", 
					  "公司"=>"A公司", 
					  "地址"=>"北京市", 
					  "电话"=>"(010)89765432", 
					  "E-mail"=>"gao@php.com"
					);
	echo "<dl>一个联系人信息：";
	foreach ($contact as $key => $value) {
		echo "<dd>$key:$value</dd>";
	}
	echo "</dl>";
?>

<!-- --------------------------使用foreach循环遍历多维数组--------------------------------------------------- -->

<hr>
<h3>使用foreach循环遍历多维数组</h3>
<?php
	$contact = array(
		"市场部"=>array(
					array(1, "高某", "市场部经理", 5000),
					array(2, "咯某", "职员", 3000),
					array(3, "峰某", "职员", 2400)
				),
		"产品部"=>array(
					array(1, "高某", "产品部经理", 5000),
					array(2, "和某", "职员", 3000),
					array(3, "金某", "职员", 2400)
				),
		"财务部"=>array(
					array(1, "李某", "财务部经理", 5000),
					array(2, "才某", "职员", 3000),
					array(3, "霍某", "职员", 2400)
				)
		);
	foreach ($contact as $key => $table) {
		echo "<table align='center' border='1' width='600'>";
		echo "<caption><h3>".$key."10月份工资表</h3></caption><tr bgcolor='#ddd'>";
		echo "<tr bgcolor='#ddd'>";
		echo "<th>编号</th><th>姓名</th><th>职务</th><th>工资</th>";
		echo "</tr>";
		foreach ($table as $row) {
			echo "<tr>";
			foreach ($row as $col) {
				echo "<td>".$col."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>

<!-- --------------------------each(), list()--------------------------------------------------- -->

<hr>
<h3>each(), list()</h3>
<?php
	$contact = array("ID"=>1, 
					  "姓名"=>"高某", 
					  "公司"=>"A公司", 
					  "地址"=>"北京市", 
					  "电话"=>"(010)89765432", 
					  "E-mail"=>"gao@php.com"
					);
	// $id = each($contact);
	// print_r($id);
	// $name = each($contact);
	// print_r($name);

	list($key,$value) = each($contact);
	echo "$key => $value";
?>

<!-- --------------------------使用数组的内部指针控制函数遍历数组----------------------------------------------- -->
<hr>
<h3>使用数组的内部指针控制函数遍历数组</h3>
<?php
	// current():取得目前指针位置的内容资料；
	// key():用来读取目前指针所指向资料的索引值；
	// next():将数组中的内部指针移动到下一个单元；
	// prev():将数组的内部指针倒回一位；
	// end():将数组的内部指针指向最后一个元素；
	// reset():将目前指针无条件移至第一个索引位置。
	
	$contact = array("ID"=>1, 
					  "姓名"=>"高某", 
					  "公司"=>"A公司", 
					  "地址"=>"北京市", 
					  "电话"=>"(010)89765432", 
					  "E-mail"=>"gao@php.com"
					);

	echo "第一个元素：".key($contact)."=>".current($contact)."<br>";

	next($contact);
	next($contact);
	echo "第三个元素：".key($contact)."=>".current($contact)."<br>";

	end($contact);
	echo "最后一个元素：".key($contact)."=>".current($contact)."<br>";

	prev($contact);
	echo "最后第二个元素：".key($contact)."=>".current($contact)."<br>";

	reset($contact);
	echo "又回到第一个元素：".key($contact)."=>".current($contact)."<br>";


?>

<!-- --------------------------操作数组的函数----------------------------------------------- -->

<?php 
	// 操作数组的函数具体见官网：
	// http://php.net/manual/zh/book.array.php
	//PHP手册>函数参考>变量与类型相关扩展
?>

</body>
</html>