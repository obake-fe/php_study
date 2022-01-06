<?php declare(strict_types=1); ?>
<?php
	function deleteSession() {
		if(ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
	}
	session_start();
	$_SESSION = [];
	deleteSession();
	session_destroy();
	
	session_start();
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
<h1>PHP基礎</h1>
<h2>16. 3-15をSESSIONを用いて実現させてください。</h2>
<form name="form" action="action.php" method="post">
	<label for="name">Enter your name: </label>
	<input type="text" name="name" id="name">
	<button type="submit" name="subscribe" value="send">Subscribe</button>
</form>
</body>
</html>