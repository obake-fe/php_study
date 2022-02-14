<?php declare(strict_types=1);
	session_start();
	
	require_once __DIR__ . "/../UsersDB.php";
	
	function updateRecord(): string {
		
		$buttonValue = filter_input(INPUT_POST, "operation");
		if(!$buttonValue) {
			return "不正なアクセスです。";
		}
		
		$id = $_SESSION["data"]["id"];
		
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
			$statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
			$statement->bindValue(":id", $id, PDO::PARAM_INT);
			$statement->execute();
			return "データ更新に成功しました。";
		} catch (PDOException $e) {
			return "データ更新に失敗しました。";
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
	<title>5-10</title>
</head>
<body>
	<p><?=updateRecord()?></p>
	<a href="deleteForm.php">topに戻る</a>
</body>
</html>