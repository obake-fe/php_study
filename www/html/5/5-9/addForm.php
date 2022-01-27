<?php declare(strict_types=1);
	
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
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-9</title>
</head>
<body>
	<h2>9. さらにユーザの新規追加や削除もできる画面なり機能なりを追加</h2>
	<form action="addConfirm.php" method="post">
		<label for="name">name</label>
		<input type="text" name="name" id="name"><br><br>
		<label for="grade">grade</label>
		<select name="grade" id="grade">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select><br><br>
		<label for="class">class</label>
		<select name="class" id="class">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
		</select><br><br>
		<button type="submit" name="operation" value="confirm">確認</button>
	</form>
</body>
</html>