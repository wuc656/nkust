<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/5/6 -->
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>修改公佈欄</title>
</head>
<body>

	<center>
	<h1>NKUST公佈欄</h1>
		<form method="post" action="modify_finish.php">
			<table width="300px" border="1">
				<tr align="center" bgcolor="#dfdddd">
					<td>公告編號</td>
					<td>公告內容</td>
				</tr>
				<?php					
					$ann= fopen("board.txt","r+");
					$ann_C = fgets($ann);
					$ann_C= explode(",",$ann_C);
					foreach ($ann_C as $key => $value){
						echo "<tr align='center'><td>".($key+1);
						echo "</td><td><input type='text' name='str[]' value='$value'></td></tr>";
					}
					fclose($ann);
				?>
			</table>
			<br>
			<input type="submit" value="確認修改">
			<input type="button" value="取消修改" onclick="location.href='index.php'">
		</form>
	</center>
</body>
</html>

