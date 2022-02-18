<?php
	declare(strict_types=1);
	
	session_start();
	// 二重送信防止用トークンの発行
	$token = uniqid('', true);
	
	//トークンをセッション変数にセット
	$_SESSION['token'] = $token;
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-18</title>
</head>
<body>
<h2>18. テキストボックスとテキストエリアを用い、上記にデータが挿入されるプログラムを記述</h2>
	<form action="result.php" method="post">
		<label for="author">author</label>
		<input type="text" name="author" id="author"><br><br>
		<label for="message">message</label>
		<textarea name="message" id="message"></textarea>
		<input type="hidden" name="token" value="<?php echo $token;?>">
		<button type="submit" name="operation" value="submit">投稿</button>
	</form>
</body>
</html>