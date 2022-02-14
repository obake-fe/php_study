<?php declare(strict_types=1);
	session_start();
	
	require_once __DIR__ . "/../UsersDB.php";
	
	function updateRecord(): string {
		
		$buttonValue = filter_input(INPUT_POST, "operation");
		if(!$buttonValue) {
			return "不正なアクセスです。";
		}
		
		$name = $_SESSION["data"]["name"];
		$grade = $_SESSION["data"]["grade"];
		$class = $_SESSION["data"]["class"];
		
		
		if (strlen($name) > 255) {
			return "名前は1文字以上255文字以内で入力してください。";
		}
		
		if (!in_array($grade, ["1", "2", "3"], true)) {
			return "学年は、1、2、3のどれかを入力してください。";
		}
		
		if (!in_array($class, ["A", "B", "C"], true)) {
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
			$statement = $pdo->prepare("INSERT INTO php_study.users(name, grade, class, status) VALUES(:name, :grade, :class, 0)");
			$statement->bindValue(":name", $name, PDO::PARAM_STR);
			$statement->bindValue(":grade", $grade, PDO::PARAM_INT);
			$statement->bindValue(":class", $class, PDO::PARAM_STR);
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
	<a href="addForm.php">topに戻る</a>
</body>
</html>