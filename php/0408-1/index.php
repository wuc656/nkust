<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/4/8 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>HW8</title>
	</head>
	<body>
		<p><b>戳戳樂</b></p>
		<table border=1>
		<?php
			$arr1=array(0=>array(0,1,0),1=>array(1,0,1),2=>array(0,1,1));
			foreach ($arr1 as $key => $value) {
				echo '<tr>';
				foreach ($value as $key1 => $value1) {
					if ($value1 == 1){
						echo '<td><a href="win.php"><img src="a.png"></a></td>';
					}
					else{
						echo '<td><a href="lose.php"><img src="a.png"></a></td>';
					}	
				}
				echo '</tr>';
			}
		?>
		</table>
	</body> 
</html>