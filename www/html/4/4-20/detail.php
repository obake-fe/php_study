<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../DB.php";
	
	/*
	 * redirect top if value is empty
	 */
	if(!isset($_GET["date"]) || trim($_GET["date"]) === "") {
		header("Location:index.php");
		return;
	}
	
	/*
	 * try to connect DB
	 */
	try {
		$phpStudyDB = new DB();
		$pdo = $phpStudyDB->connectDB();
	} catch (PDOException $e) {
		echo "DB接続に失敗しました。";
		return;
	}
	
	/*
	 * try to extract data
	 */
	try {
		$statement = $pdo->prepare("SELECT users.id, users.name, grade, class, language, math, science, society FROM php_study.users LEFT OUTER JOIN php_study.users_test_data ON users.id = users_test_data.id WHERE date = :date");
		$statement->bindValue(":date", $_GET["date"], PDO::PARAM_INT);
		$statement->execute();
	} catch (PDOException $e) {
		echo "データ抽出に失敗しました。";
		return;
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4-20</title>
</head>
<body>
<h3><?="{$_GET["date"]}のテスト結果"?></h3>
<?php if (!$statement->rowCount()) { ?>
	<p><?="{$_GET["date"]}はデータが存在しない日付です。"?></p>
<?php } ?>
<table border="1">
	<thead>
	<tr>
		<th>id</th>
		<th>名前</th>
		<th>学年</th>
		<th>クラス</th>
		<th>国語</th>
		<th>数学</th>
		<th>理科</th>
		<th>社会</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($statement as $row): ?>
		<tr>
			<td><?=($phpStudyDB->escape($row["id"]))?></td>
			<td><?=($phpStudyDB->escape($row["name"]))?></td>
			<td><?=($phpStudyDB->escape($row["grade"]))?></td>
			<td><?=($phpStudyDB->escape($row["class"]))?></td>
			<td><?=($phpStudyDB->escape($row["language"]))?></td>
			<td><?=($phpStudyDB->escape($row["math"]))?></td>
			<td><?=($phpStudyDB->escape($row["science"]))?></td>
			<td><?=($phpStudyDB->escape($row["society"]))?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>