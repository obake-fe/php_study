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
		$statement = $pdo->query("SELECT DISTINCT(date) FROM php_study.users_test_data WHERE date IS NOT NULL");
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
<h2>20. テストが実施された日付一覧を表示し、クリックするとその日のテスト結果を表示</h2>
<table border="1">
	<thead>
	<tr>
		<th>日付</th>
	</tr>
	</thead>
	<tbody>
		<?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
			<tr>
				<td>
					<a href="detail.php?date=<?=($phpStudyDB->escape($row["date"]))?>" target="_blank">
						<?=($phpStudyDB->escape($row["date"]))?>
					</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
</body>
</html>