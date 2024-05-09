<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/5/6 -->
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>公佈欄</title>
</head>
<body>
	<center>
	<h1>NKUST公佈欄</h1>
		<table width="300px" border="1">			
			<tr align="center" bgcolor="#dfdddd">
				<td>公告編號</td>
				<td>公告內容</td>
			</tr>
			<?php
				$ann = fopen("board.txt","r+");
				$ann_C = explode(",",fgets($ann));
				foreach ($ann_C as $key => $value) {
					echo "<tr align='center'><td>".($key+1);
					echo "</td><td>".$value."</td></tr>";
				}
				fclose($ann);
			?>
		</table>
		<br>
		<input type="button" value="修改內容" onclick="location.href='modify.php'">
	</center>
</body>
</html>