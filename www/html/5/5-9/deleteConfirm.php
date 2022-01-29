<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	$id = filter_input(INPUT_POST, "name");
	
	/*
	 * redirect top if value is empty
	 */
	if(!$id) {
		header("Location:deleteForm.php");
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
	
	/*
	 * try to fetch data
	 */
	try {
		$statement = $pdo->prepare("SELECT name FROM users WHERE id = :id");
		$statement->bindValue(":id", $id, PDO::PARAM_INT);
		$statement->execute();
	} catch (PDOException $e) {
		echo "データ抽出に失敗しました。";
		return;
	}
	
	session_start();
	
	$_SESSION["data"] = [
		"id" => $id,
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
	<?php foreach ($statement as $row): ?>
		<p><?=($phpStudyDB->escape($row["name"]))?> を削除しますか？</p>
	<?php endforeach; ?>
	<form action="deleteComplete.php" method="post">
		<button type="submit" name="operation" value="add">削除する</button>
	</form><br>
	<a href="addForm.php">戻る</a>
</body>
</html>