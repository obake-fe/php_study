<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-7</title>
</head>
<body>
	<h2>7. phpのプログラムで自分自身にメールを送ってください</h2>
	<form action="confirm.php" method="post">
		<label for="email">送り先 : </label><br>
		<input type="email" name="email" id="email"><br><br>
		<label for="title">件名 : </label><br>
		<input type="text" name="title" id="title"><br><br>
		<label for="message">メッセージ : </label><br>
		<textarea name="message" id="message"></textarea><br>
		<button type="submit" name="operation" value="send">送信</button>
	</form>
</body>
</html>