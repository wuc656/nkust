<?php
	echo "<p style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center> B網頁<br>";
	if(!empty($_POST['id']) && !empty($_POST['password']) ){
	$mynumber_1 = $_POST["id"];
	$mynumber_2 = $_POST["password"];
	echo "ID: ";
	echo $mynumber_1;
	echo "<br>";
	echo "Password: ";
	echo $mynumber_2;
	}
	else{
	echo "帳號密碼未設定";	
	}
	echo "</p>";
?>
<p style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center> 回首頁

<form style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center action="index.php" method="post">
　<input type="submit" value="點我"/>
</form><br>

</p>