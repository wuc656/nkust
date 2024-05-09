<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/3/22 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>BMI</title>
	</head>
	<body>
		<p><b> BMI計算工具 </b></p>
		個人資料：
		<form action="bmi.php" method="get">
		姓名<input type="text" name="n"/><br>
		年齡<input type="text" name="a"/><br>
		身高<input type="text" name="h"/><br>
		體重<input type="text" name="w"/><br>
		<input type="submit" value="送出"/>
		<input type="reset" value="取消"/>
		</form><br>
	<?php
		$name = $_GET["n"];
		$age = $_GET["a"];
		$hight = $_GET["h"];
		$weight = $_GET["w"];
		echo $name;
		echo '<br>';
		echo $age;
		echo '<br>';
		echo $hight;
		echo '<br>';
		echo $weight;
		echo '<br>';
	?>                          
	</body> 
</html>