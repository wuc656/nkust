<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/3/29 -->
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">
		<title>歡迎光臨本網站</title>
		<style> *{background-color: #DFDDDD;} img{ box-shadow: 0 0 12px rgba(51, 51, 102, 0.5);}</style>
	</head>
	<body>
	<div style="text-align:center;">
		<?php
		function ads() {
			$i = rand(1,5);
			switch ($i) {
				case 1:
					echo '<img src="1.jpg">';
					break;
				case 2:
					echo '<img src="2.jpg">';
					break;
				case 3:
					echo '<img src="3.jpg">';
					break;
				case 4:
					echo '<img src="4.jpg">';
					break;
				case 5:
					echo '<img src="5.jpg">';
					break;
			}
		}
		ads();
		?>
		<br><br>以下是網站內容.......
	</div>
	</body>	
</html>