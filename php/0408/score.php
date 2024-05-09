<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/4/8 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>HW7</title>
	</head>
	<body>
		<p><b> 教師成績管理系統 </b></p>
		<table border=1>
		<tr><th>座號</th>
        <th>成績</th></tr>
		<?php
		$student_score = $_POST["sc"];
		$pass = 0;
		$nopass = 0;
		foreach ($student_score as $key => $value) {
			if($value>=60){
				$pass = $pass + 1;
			}
			else{
				$nopass = $nopass + 1;
			}
			$temp = $key + 1;
			echo '<tr><td>'.$temp.'</td><td>';
			echo $value.'</td></tr>';
		}
		echo '</table>';
		echo '總共及格人數為：'.$pass;
		echo '<br>';
		echo '總共不及格人數為：'.$nopass;
		?>                          
	</body> 
</html>