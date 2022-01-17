<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../DB.php";
	
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
	 * try to fetch data
	 */
	try {
		$statement = $pdo->query("SELECT id, name FROM php_study.users");
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
	<title>4-19</title>
</head>
<body>
<h2>19. 上記を、ユーザ一覧を表示し、クリックするとユーザ情報とテスト結果が表示されるように改修</h2>
<table border="1">
	<thead>
	<tr>
		<th>id</th>
		<th>名前</th>
	</tr>
	</thead>
	<tbody>
		<?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
			<tr>
				<td><?=($phpStudyDB->escape($row["id"]))?></td>
				<td>
					<a href="detail.php?id=<?=($phpStudyDB->escape($row["id"]))?>" target="_blank">
						<?=($phpStudyDB->escape($row["name"]))?>
					</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
</body>
</html>