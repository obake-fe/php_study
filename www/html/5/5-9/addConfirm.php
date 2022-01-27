<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	$name = filter_input(INPUT_POST, "name");
	$grade = filter_input(INPUT_POST, "grade");
	$class = filter_input(INPUT_POST, "class");
	
	/*
	 * redirect top if value is empty
	 */
	if(!$name || !$grade || !$class) {
		header("Location:addForm.php");
		return;
	}
	
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
	
	session_start();
	
	$_SESSION["data"] = [
		"name" => $name,
		"grade" => $grade,
		"class" => $class
	];
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
	<h2>新規追加</h2>
		<p><?="名前 : {$name}"?>、<?="学年 : {$grade}"?>、<?="クラス : {$class}"?>を追加しますか？</p>
	<form action="addComplete.php" method="post">
		<button type="submit" name="operation" value="add">追加する</button>
	</form><br>
	<a href="addForm.php">戻る</a>
</body>
</html>