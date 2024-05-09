<?php
	echo "<p style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center> C網頁<br>";
	if(!empty($_POST['id']) && !empty($_POST['password']) ){
	$mynumber_1 = $_POST["id"];
	$mynumber_2 = $_POST["password"];
	setrawcookie("id", $mynumber_1, time()+3600);
	setrawcookie("password", $mynumber_2, time()+3600);
	echo "帳號密碼已儲存";
	echo"<form style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center action=c.php method=post>
	<input type=submit name='' value='按此顯示'/>
	</form><br>";
	}
	else{
	if ( isset($_COOKIE["id"]) && isset($_COOKIE["password"])){
	echo "ID: ";
	echo $_COOKIE["id"];;
	echo "<br>";
	echo "Password: ";
	echo $_COOKIE["password"];
	}
	else{
	echo "帳號密碼未設定";
	}
	}
	echo "</p>";
	echo "<br><br>";
?>
<p style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center> 帳密清除

<form style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center action="c.php" method="post">
　<input type="submit" name="cls" value="clean"/>
</form><br>

</p>
<?php
	if($_POST['cls']=="clean"){
	setrawcookie("id", "", time()-3600);
	setrawcookie("password", "", time()-3600);
	echo "<p style=font-size:25px;font-family:serif cellpadding=5 border=2 align=center valign=center>";
	echo "帳號密碼清除成功";
	echo"<form style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center action=c.php method=post>
	<input type=submit name='' value='按此重整'/>
	</form><br>";
	echo "</p>";
	}
?>

<p style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center> 回首頁

<form style=font-size:30px;font-family:serif cellpadding=5 border=2 align=center valign=center action="index.php" method="post">
　<input type="submit" value="點我"/>
</form><br>

</p>