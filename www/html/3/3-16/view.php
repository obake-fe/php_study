<?php
	declare(strict_types=1);
	function deleteSession() {
		if(ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
	}
	session_start();
//  セッションの内容をviewで表示しているのでコメントアウト
//  代わりにform.phpでセッション破棄を行っている
//	$_SESSION = [];
//	deleteSession();
//	session_destroy();
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-16</title>
</head>
<body>
<h1>POST Success!</h1>
<p>name : <?=$_SESSION["data"]["name"]?></p>
</body>
</html>
