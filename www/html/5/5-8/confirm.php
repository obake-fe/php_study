<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	$id = filter_input(INPUT_POST, "name");
	$key = filter_input(INPUT_POST, "key");
	$value = filter_input(INPUT_POST, "value");
	
	/*
	 * redirect top if value is empty
	 */
	if(!$id || !$key || !$value) {
		header("Location:index.php");
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
	 * try to extract data
	 */
	try {
		$statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
		$statement->bindValue(":id", $id, PDO::PARAM_INT);
		$statement->execute();
	} catch (PDOException $e) {
		echo "データ抽出に失敗しました。";
		return;
	}
	
	session_start();
	
	$_SESSION["data"] = [
		"id" => $id,
		"key" => $key,
		"value" => $value
	];
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
	<?php foreach ($statement as $row): ?>
		<p><?=($phpStudyDB->escape($row["name"]))?> の <?=$key."を ".$value." に変更しますか？"?></p>
	<?php endforeach; ?>
	<form action="update.php" method="post">
		<button type="submit" name="operation" value="change">変更する</button>
	</form>
	<a href="index.php">戻る</a>
</body>
</html>