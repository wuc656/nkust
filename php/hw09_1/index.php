<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/5/6 -->
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">
		<title>個人資訊管理</title>
		<style>
			*{font-family:"微軟正黑體";} 
			body{margin:0px auto;}
			table{text-align:center;margin:0px auto;width:400px;border-collapse:collapse;}
			#content{text-align:center;}
			#file_upload{background-color:#DFDDDD;}
		</style>
	</head>
	
	<body>
		<div id="content">
		<h1>個人資訊管理</h1>
		<table border="1" >
			<tr>
				<td colspan="2">
				<!--判斷是否已經上傳大頭貼sticker.jpg，如果沒有就使用預設大頭貼default.jpg-->
					<?php if(file_exists("sticker.jpg")) {
							echo "<img src='sticker.jpg' width='200px' height='200px'>";
						}else{
							echo "<img src='default.jpg' width='200px' height='200px'>";							
						}
					?>
					<div id="file_upload">
					<!--顯示上傳表單-->
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<font color="red">上傳圖片限.jpg格式</font>
						<br>
						<input type="file" name="fileUpload"><br>
						<input type="submit" value="上傳大頭貼">
					</form>
					</div>
				</td>
			</tr>
			<tr>
				<td>姓名</td>
				<td>王小明</td>
			</tr>
			<tr>
				<td>帳號</td>
				<td>kk3398</td>
			</tr>
			<tr>
				<td>電子郵件</td>
				<td>kk3398@gmail.com</td>
			</tr>
		</table>
		</div>
	</body>
</html>