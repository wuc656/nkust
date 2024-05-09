<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/4/8 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>HW7</title>
	</head>
	<body>
		<p><b> 教師成績管理系統 </b></p>
		<form action="score.php" method="post">
		<table border=1>
		<tr><th>座號</th>
        <th>成績</th></tr>
		<?php
			for($x=1;$x<=5;$x++){
				echo '<tr><td>'.$x;
				echo '</td><td><input type="text" name="sc[]"/></td></tr>';
			}
		?>
		</table>
		<input type="submit" value="成績輸入"/>
		<input type="reset" value="清除"/>
		</form><br>                          
	</body> 
</html>