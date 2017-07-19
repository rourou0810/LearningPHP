<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<h1>这是user页面！</h1>
	<div>	
		<h3>UserList列表</h3>
		<table cellspacing="0" border="1">	
			<th>序号</th>
			<th>姓名</th>
			<th>年龄</th>
			<?php 	foreach ($userList as $item) { ?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['age']; ?></td>
				</tr>
				
			<?php } ?>
		</table>
	</div>
</body>
</html>