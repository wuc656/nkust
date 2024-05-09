<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/3/29 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>BMI</title>
	</head>
	<body>
	<?php
		$name = $_GET["n"];
		$age = $_GET["a"];
		$hight = $_GET["h"];
		$weight = $_GET["w"];
		echo $name."先生/小姐：";
		echo '<br>';
		echo "你的年齡為：".$age;
		echo '<br>';
		echo "你的身高為：".$hight;
		echo '<br>';
		echo "你的體重為：".$weight;
		echo '<br>';
		echo "你的BMI值為：".$weight/pow($hight/100,2);
	?>                          
	</body> 
</html>