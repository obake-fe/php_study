<?php declare(strict_types=1); ?>
<!--(3) view.php : action.phpで保存されたCookieの内容を表示する。-->
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1>GET Success!</h1>
	<p>name : <?=$_COOKIE["name"]?></p>
</body>
</html>
