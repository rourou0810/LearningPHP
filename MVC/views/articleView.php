<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<h1>这是Article页面！</h1>
	<div>	
		<h3>ArticleList列表</h3>
		<table cellspacing="0" border="1">	
			<th>序号</th>
			<th>主题</th>
			<th>内容</th>
			<?php 	foreach ($articleList as $item) { ?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['title']; ?></td>
					<td><?php echo $item['text']; ?></td>
				</tr>
				
			<?php } ?>
		</table>
	</div>
</body>
</html