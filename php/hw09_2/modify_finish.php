<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/5/6 -->
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>修改公佈欄</title>
</head>
<body>
<?php
		$ann_text = implode(",",$_POST["str"]);
		$ann = fopen("board.txt","w+");
		$ann_W = fwrite($ann,$ann_text);
		if($ann_W == true){
			echo "儲存成功<br>";
		}
		else{
			echo "儲存失敗<br>";

		}
		fclose($ann);
	?>
	<br>
	<input type="button" value="回首頁" onclick="location.href='index.php'">
</body>
</html>

