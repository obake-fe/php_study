<?php declare(strict_types=1);
	function connectDB (): string {
		$dsn = "mysql:host=db; dbname=test; charset=utf8mb4";
		$password = "secret";
		
		$userList = array(
			"root", "root", "root", "root", "root1"
		);
		
		try {
			$user = $userList[random_int(0, 4)];
		} catch (Exception $e) {
		}
		
		try {
			$pdo = new PDO($dsn, $user, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return "ユーザー名: {$user}<br>接続に成功しました。";
		} catch (PDOException $e) {
			return "ユーザー名: {$user}<br>接続に失敗しました。".$e->getMessage();
		}
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4-2</title>
</head>
<body>
	<h1>4. SQL</h1>
	<h2>2. 上記において、1/5の確率でわざと間違ったユーザ名を用いるようにして、成功の場合は「OK」、失敗の場合は「Database Connection Failed」 のみを表示してください。</h2>
	<p><?=connectDB()?></p>
	<form action="index.php" method="post">
		<input type="submit" name="connect" value="接続" />
	</form>
</body>
</html>