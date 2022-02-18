<?php
	declare(strict_types=1);
	
	session_start();
	
	if (!isset($_SESSION["data"]["name"], $_SESSION["data"]["email"], $_SESSION["data"]["password"])) {
		header("Location: login.php");
	}
	
	function escape($value): string {
		return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5);
	}

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-16</title>
</head>
<body>
<p>ようこそ <?=escape($_SESSION["data"]["name"])?>さん</p>
<a href="login.php">ログアウト</a>
</body>
</html>