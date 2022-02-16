<?php
	declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	$phpStudyDB = new UsersDB();
	$pdo = $phpStudyDB->connectDB();
	
	if (isset($_POST["email"], $_POST["password"])) {
		try {
			$sql = "SELECT * FROM php_study.idpass WHERE mail = '{$_POST["email"]}' AND password = '{$_POST["password"]}'";
			$statement = $pdo->query($sql);
			$user = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$message = "Error";
			exit;
		}
	} else {
		$user = null;
	}
	
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-15</title>
</head>
<body>
	<h2>15. SQLインジェクションによる攻撃例をデモしてください</h2>
	<form name="login-form" action="" method="post">
		<label for="email">email: </label>
		<input type="text" name="email" id="email"> (例:dummy)<br>
		<label for="password">password: </label>
		<input type="text" name="password" id="password"> (例: ' or '1'='1)<br>
		<button type="submit" name="operation" value="login">ログイン</button>
	</form>
	<hr>
	<?php if (isset($_POST["operation"]) && $_POST["operation"] === "login"): ?>
		<?php if (isset($user["id"])): ?>
			<p><?=$phpStudyDB->escape($user["name"])?>さん。ログインに成功しました。</p>
		<?php else : ?>
			<p>ログインに失敗しました。</p>
		<?php endif; ?>
	<?php endif; ?>
</body>
</html>