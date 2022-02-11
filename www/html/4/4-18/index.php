<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../DB.php";
	
	/*
	 * redirect top if value is empty
	 */
	if(!isset($_GET["id"]) || trim($_GET["id"]) === "") {
		header("Location:index.html");
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
		$statement = $pdo->prepare("SELECT users.id, users.name, grade, class, date, language, math, science, society FROM php_study.users LEFT OUTER JOIN users_test_data ON users.id = users_test_data.id WHERE users.id = :id");
		$statement->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "データ抽出に失敗しました。";
		return;
	}
	
	/**
	 * @param $row
	 * @param $phpStudyDB
	 * @return string
	 */
	function showErrorText ($row, $phpStudyDB): string {
		if (!$row) {
			return "{$_GET["id"]}は存在しないidです。";
		}
		if (is_null($row["date"])) {
			return "{$phpStudyDB->escape($row["name"])}はテストを受けてません。";
		}
		return "{$phpStudyDB->escape($row["name"])}の情報";
	}
	
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4-18</title>
</head>
<body>
<h2>18. user_idを入力してユーザ情報とテスト結果を表示する<br>→存在しないuser_idなら存在しませんとメッセージを表示<br>→テスト結果がなければテスト受けてませんとメッセージを表示</h2>
<p><?=showErrorText($row, $phpStudyDB)?></p>
<?php if ($row && !is_null($row["date"])) {?>
	<table border="1">
		<thead>
		<tr>
			<th>id</th>
			<th>名前</th>
			<th>学年</th>
			<th>クラス</th>
			<th>日付</th>
			<th>国語</th>
			<th>数学</th>
			<th>理科</th>
			<th>社会</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=($phpStudyDB->escape($row["id"]))?></td>
				<td><?=($phpStudyDB->escape($row["name"]))?></td>
				<td><?=($phpStudyDB->escape($row["grade"]))?></td>
				<td><?=($phpStudyDB->escape($row["class"]))?></td>
				<td><?=($phpStudyDB->escape($row["date"]))?></td>
				<td><?=($phpStudyDB->escape($row["language"]))?></td>
				<td><?=($phpStudyDB->escape($row["math"]))?></td>
				<td><?=($phpStudyDB->escape($row["science"]))?></td>
				<td><?=($phpStudyDB->escape($row["society"]))?></td>
			</tr>
		</tbody>
	</table>
<?php }?>
</body>
</html>