<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../DB.php";
	
	/*
	 * redirect top if value is empty
	 */
	if(!isset($_POST["update"]) || !array_key_exists("name", $_POST)) {
		header("Location:index.php");
		return;
	}
	
	function updateRecord(): string {
		if ($_POST["name"] === '' || strlen($_POST["name"]) > 255) {
			return "名前は1文字以上255文字以内で入力してください。";
		}
		
		/*
		 * try to connect DB
		 */
		try {
			$phpStudyDB = new DB();
			$pdo = $phpStudyDB->connectDB();
		} catch (PDOException $e) {
			return "DB接続に失敗しました。";
		}
		
		/*
		 * try to extract data
		 */
		try {
			$statement = $pdo->prepare("UPDATE users SET name = :name WHERE id = :id");
			$statement->bindValue(":name", $_POST["name"], PDO::PARAM_INT);
			$statement->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
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
	<title>4-21</title>
</head>
<body>
	<p><?=updateRecord()?></p>
	<a href="index.php">topに戻る</a>
</body>
</html>