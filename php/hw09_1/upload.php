<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/5/6 -->
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>上傳檔案</title>
</head>
<body>
<?php
if ($_FILES['fileUpload']['type'] == 'image/jpeg'){
	$tmpname = $_FILES["fileUpload"]["tmp_name"];
	$_FILES["fileUpload"]["name"] = "sticker.jpg";
	$name = $_FILES["fileUpload"]["name"];
	if (move_uploaded_file($tmpname,$name)){
		echo '上傳成功。<br>';
		echo '檔案名稱: ' . $_FILES['fileUpload']['name'] . '<br>';
		echo '檔案類型: ' . $_FILES['fileUpload']['type'] . '<br>';
		echo '檔案大小: ' . $_FILES['fileUpload']['size'] . ' <br>';
	}
	else{
		echo '上傳失敗。<br>';
	}
}
else {
	echo '您所選的檔案格式錯誤，請重新上傳！<br>';
}
?>
	<input type="button" value="回首頁" onclick="location.href='index.php'">
</body>
</html>