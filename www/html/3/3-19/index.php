<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-19</title>
</head>
<body>
<h1>PHP基礎</h1>
<h2>19. 全てのサーバー変数をブラウザに出力するプログラムを書いてください。 <br>(整形してある程度見やすく表示。)</h2>
<table border="1">
	<tr>
		<th>サーバ変数のkey</th>
		<th>サーバの情報</th>
	</tr>
	<?php
		foreach ($_SERVER as $key => $var) {
			echo "<tr><td>{$key}</td>";
			echo "<td>{$var}</td></tr>";
		}
	?>
</table>

</body>
</html>