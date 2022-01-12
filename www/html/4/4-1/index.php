<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4-1</title>
</head>
<body>
	<h1>4. SQL</h1>
	<h2>1. phpmyadminで「test」という名前でデータベースを作成し、そのデータベースに接続するPHPプログラムを記述してください</h2>
	<?php
		$dsn = "mysql:host=db; dbname=test; charset=utf8mb4";
		$user = "root";
		$password = "secret";
		
		try {
			$pdo = new PDO($dsn, $user, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			echo "接続に成功しました。";
		} catch (PDOException $e) {
			echo "接続に失敗しました。".$e->getMessage();
			die();
		}
		// 接続を閉じる
		$dsn = null;
	?>
	<h3>参考</h3>
	<p><a href="https://zukucode.com/2019/06/docker-compose-mysql.html" rel="noreferrer" target="_blank">Docker Composeでphpでmysqlにアクセスする</a></p>
</body>
</html>