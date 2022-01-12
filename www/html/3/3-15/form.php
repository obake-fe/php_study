<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-15</title>
</head>
<body>
<h1>PHP基礎</h1>
<h2>以下の仕様で3ファイル作成してください。<br>(1) form.php : テキストボックスを設置する。<br>(2) action.php : postのaction先。テキストボックスの内容をCookieに保存する。<br>(3) view.php : action.phpで保存されたCookieの内容を表示する。</h2>
<h3>(1) form.php : テキストボックスを設置する</h3>
<form name="form" action="action.php" method="get">
	<label for="name">Enter your name: </label>
	<input type="text" name="name" id="name">
	<button type="submit" name="subscribe" value="send">Subscribe</button>
</form>
</body>
</html>