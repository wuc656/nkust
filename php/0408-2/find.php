<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/4/8 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>HW9</title>
	</head>
	<body>
		<h1><p><b>高應大學生資料查詢系統</b></p></h1>
		<?php
			$str = $_POST["str"];
			
			$csie[0]['no'] = "1104108101";
			$csie[0]['class'] = "四資工一甲";
			$csie[0]['name'] = "王建銘";
			$csie[0]['address'] = "高雄市三民區建工路415號";
			
			$csie[1]['no'] = "1104108102";
			$csie[1]['class'] = "四資工一甲";
			$csie[1]['name'] = "段嘉興";
			$csie[1]['address'] = "高雄市新興區錦田路555號";
			
			$csie[2]['no'] = "1104108103";
			$csie[2]['class'] = "四資工一甲";
			$csie[2]['name'] = "林佳純";
			$csie[2]['address'] = "高雄市鼓山區美術館路85號";
			
			$csie[3]['no'] = "1104108104";
			$csie[3]['class'] = "四資工一甲";
			$csie[3]['name'] = "王智傑";
			$csie[3]['address'] = "高雄市左營區文自路925號";
			
			$flag1 = false;
			$num1 = 0;
			
			foreach ($csie as $key => $value){
				if($value['name'] == $str or $value['no'] == $str ){
					$flag1 = true;
					$num1 = $key;
				}
			}
			if ($flag1){
				echo '<h4><p><b>您要查詢的資料如下：</b></p></h4>';
				echo '學號：'.$csie[$num1]['no'];
				echo '<br>';
				echo '班級：'.$csie[$num1]['class'];
				echo '<br>';
				echo '姓名：'.$csie[$num1]['name'];
				echo '<br>';
				echo '地址：'.$csie[$num1]['address'];
			}
			else{
				echo '<h3><p><b>查無此學生資料，請重新輸入</b></p></h3>';
			}
		?>
	</body> 
</html>