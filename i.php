<html dir="ltr" style="direction: ltr;" lang="zh-tw"><head>
  
  <meta http-equiv="content-type" content="text/html; charset=Big5"><title>吳彥東的創世神伺服器【1.12.2】</title>
  <meta name="author" content="DDS">

  
  <meta name="description" content="DDS">

  
  <link rel="shortcut icon" href="https://nkust.wuc656.com/favicon.ico">

  
  <link rel="bookmark" href="favicon.ico"></head><body style="color: rgb(0, 0, 0); background-color: rgb(255, 204, 0);" alink="#000099" link="#000099" vlink="#990099">
<div style="text-align: center;"><a href="https://nkust.wuc656.com/i.php"><img src="https://nkust.wuc656.com/image/index-1.png" style="border: 0px solid ; width: 721px; height: 60px;" alt=""></a><br>
<big><big><span style="font-weight: bold;">首頁</span></big></big><br>
</div>

<marquee>滑過~~~~~~~~</marquee>

<p> 圖形 </p>

<?php
	for($s=1;$s<=6;$s++){
    for($a=6-$s;$a>=1;$a--){
		echo '&nbsp;&nbsp;';
	}
        for($y=1;$y<=(($s*2)-1);$y++){
            echo '*';
        }
	echo '<br/>';
	}
	for($a=1;$a<=3;$a++){
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '***';
	echo '<br/>';
	}

?>

<p> 1!~10! 相加 </p>

<?php
	
	$temp1=0;
    for($a=1;$a<=10;$a++){
		$temp=1;
        for($y=1;$y<=$a;$y++){
			$temp = $temp * $y;
        }
		$temp1 = $temp1 + $temp;
    }
	echo $temp1;

?>

<p> 九九乘法表 </p>

<?php
    for($s=1;$s<=9;$s++){

        echo '<br/>';

        for($y=1;$y<=9;$y++){

            echo '<span style="display: inline-block;width: 85px;margin-bottom:5px;">'.$y.' * '.$s.' = '.$y * $s.'</span>';
        }

    }

?>
</body></html>