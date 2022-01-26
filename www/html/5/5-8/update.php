<?php declare(strict_types=1);
	session_start();
	
	require_once __DIR__ . "/../UsersDB.php";
	
	function updateRecord(): string {
		
		$buttonValue = filter_input(INPUT_POST, "operation");
		if(!$buttonValue) {
			return "不正なアクセスです。";
		}
		
		$id = $_SESSION["data"]["id"];
		$key = $_SESSION["data"]["key"];
		$value = $_SESSION["data"]["value"];
		
		
		if ($key === "name" && strlen($value) > 255) {
			return "名前は1文字以上255文字以内で入力してください。";
		}
		
		if ($key === "grade" && !in_array($value, ["1", "2", "3"], true)) {
			return "学年は、1、2、3のどれかを入力してください。";
		}
		
		if ($key === "class" && !in_array($value, ["A", "B", "C"], true)) {
			return "クラスは、A、B、Cのどれかを入力してください。";
		}
		
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
			if ($key === "name") {
				$statement = $pdo->prepare("UPDATE users SET name = :value WHERE id = :id");
			} elseif ($key === "grade") {
				$statement = $pdo->prepare("UPDATE users SET grade = :value WHERE id = :id");
			} elseif ($key === "class") {
				$statement = $pdo->prepare("UPDATE users SET class = :value WHERE id = :id");
			} else {
				return "不正なアクセスです。";
			}
			$statement->bindValue(":value", $value, PDO::PARAM_INT);
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
	<title>5-8</title>
</head>
<body>
	<p><?=updateRecord()?></p>
	<a href="index.php">topに戻る</a>
</body>
</html>