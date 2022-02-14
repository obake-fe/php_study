<?php
	declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	function updateRecord(): string
	{
		
		$buttonValue = filter_input(INPUT_POST, "operation");
		if (!$buttonValue) {
			return "不正なアクセスです。";
		}
		
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		/*
		 * try to connect DB
		 */
		try {
			$phpStudyDB = new UsersDB();
			$pdo = $phpStudyDB->connectDB();
		} catch (PDOException $e) {
			return "DB接続に失敗しました。";
		}
		
		/*
		 * try to extract data
		 */
		try {
			$statement = $pdo->prepare("SELECT * FROM php_study.idpass WHERE mail = :mail AND password = :password");
			$statement->bindValue(":mail", $email, PDO::PARAM_STR);
			$statement->bindValue(":password", $password, PDO::PARAM_STR);
			$statement->execute();
			
			if ($statement->rowCount()) {
				return "正しいemailとpasswordです。";
			}
			return "誤ったemailとpasswordです。";
		} catch (PDOException $e) {
			return "データの比較に失敗しました。";
		}
	}

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-12</title>
</head>
<body>
<p><?= updateRecord() ?></p>
<a href="index.php">topに戻る</a>
</body>
</html>