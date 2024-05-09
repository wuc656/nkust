<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/3/22 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>作業三</title>
	</head>
	<body>
		<?php
			echo "我的第一個php程式 <br>"
		?>
		<?php					/* php要用<?php ?>括起來,而不是用<%php%> */
			$st1 = "first";		//變數第一個字不能為"數字"，此處將1st修改成st1
			echo $st1;			//變數前需要加上 "$"
			
			echo "<br>";		//排版
			
			$num = 2;			//變數前需要加上 "$",php沒有int num此種定義方式,若是要定義指定類型的變數,直接在"="後面打上此類型的值就好
			echo $num;			//變數前需要加上 "$"
			
			echo "<br>";		//排版
			
			$var1 = "MY";
			echo $var1;      	//php沒有print此種方法,要用的類似方法是"echo"
			
			echo "<br>";		//排版
			
			$var2 = "WEB";
			echo $var1."<br>".$var2	//要在php用echo輸出html內容的話要用雙引號括起來
		?>                          
	</body> 
</html>