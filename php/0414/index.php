<!DOCTYPE html>
<!-- C10815108 吳彥東 四資工三甲 2022/3/29 -->
<html lang="zh-TW">
	<head>
		<meta charset = utf-8>
		<title>貨幣轉換工具</title>
	</head>
	<body>
		<h1>貨幣轉換器</h1>
		<form action="money.php" method="post">
			<table border="1" width="400">
				<tr>
					<td>
						請輸入轉換金額：
					</td>
					<td align="center">
						<input type="radio" name="kind" value="US">新台幣↔美元
					</td>
					<td rowspan="2" align="center">
						<input type="submit" value="轉換">
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="text" name="money">
					</td>
					<td align="center">
						<input type="radio" name="kind" value="TW">美元↔新台幣
					</td>
				</tr>
			</table>
			最新匯率：1美元=31.2新台幣
		</form>
	</body>
</html>