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
		$bmi = $weight/pow($hight/100,2);
		$ans = "";
		
		echo $name."先生/小姐：";
		echo '<br>';
		echo "你的年齡為：".$age;
		echo '<br>';
		echo "你的身高為：".$hight."公分";
		echo '<br>';
		echo "你的體重為：".$weight."公斤";
		echo '<br>';
		echo "你的BMI值為：".$bmi;
		echo '<br>';
		
		if($bmi < 18.5)
			$ans = "體重過輕";
		elseif ($bmi < 24)
			$ans = "正常範圍";
		elseif ($bmi < 27)
			$ans = "過重";
		elseif ($bmi < 30)
			$ans = "輕度肥胖";
		elseif ($bmi < 35)
			$ans = "中度肥胖";
		elseif ($bmi >= 35)
			$ans = "重度肥胖";
		echo "健康狀況：".$ans;
	?>                          
	</body> 
</html>