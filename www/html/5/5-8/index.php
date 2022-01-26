<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
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
	
	/*
	 * try to connect DB
	 */
	try {
		$phpStudyDB = new UsersDB();
		$pdo = $phpStudyDB->connectDB();
	} catch (PDOException $e) {
		echo "DB接続に失敗しました。";
		return;
	}
	
	/*
	 * try to fetch data
	 */
	try {
		$statement = $pdo->query("SELECT id, name FROM php_study.users");
	} catch (PDOException $e) {
		echo "データ抽出に失敗しました。";
		return;
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-8</title>
</head>
<body>
<h2>8. SQL課題で作成したユーザ情報編集機能について、<br>select - option を用いステータスの更新もできるように改修、<br>ついでに確認画面を挟んで登録するようにしてください</h2>
<form action="confirm.php" method="post">
	<label for="name">select name : </label>
	<select name="name" id="name">
		<?php foreach ($statement as $row): ?>
			<option value="<?=($phpStudyDB->escape($row["id"]))?>"><?=($phpStudyDB->escape($row["name"]))?></option>
		<?php endforeach; ?>
	</select><br><br>
	<label for="key">select key : </label>
	<select name="key" id="key">
		<option value="name">名前</option>
		<option value="grade">学年</option>
		<option value="class">クラス</option>
	</select><br><br>
	<label for="value">input value</label>
	<input type="text" name="value" id="value"><br><br>
	<button type="submit" name="operation" value="confirm">確認</button>
</form>
</body>
</html>