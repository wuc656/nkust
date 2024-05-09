<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/4/14 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>BMI</title>
	</head>
	<body>
		<h1>貨幣轉換器</h1>
		<?php //這裡格式錯誤 <?php 被打成<?
			function money_change($money,$kind) {
				if($kind=="us"){
					return $money/31.2;
				}else{
					return $money*31.2;
				}
			
			}
		?>
		<table border="1" width="300">
			<tr>
				<td align="center">
					<?php echo $_POST['money']; ?>
				</td>
				
				<td align="center">
					<?php
						if($_POST['kind']=="US"){
							echo "新台幣↔美元";
							$kind = "us";  //設定$kind為us
						}elseif($_POST['kind']=="TW"){
							echo "美元↔新台幣";
							$kind = "tw"; //設定$kind為tw
						}
					?>				
				</td>
				<td align="center">
					<?php
						echo money_change($_POST['money'],$kind);			
					?>	
				</td>
			</tr>
		</table>
	</body> 
</html>