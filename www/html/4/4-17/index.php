<?php declare(strict_types=1);

	require_once __DIR__ . "/../DB.php";
	
	$phpStudyDB = new DB();
	$pdo = $phpStudyDB->connectDB();
	$statement = $pdo->query("SELECT * FROM users");
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4-17</title>
</head>
<body>
	<h2>17. usersテーブルを全て出力するselectのSQLをPHPから実行し、結果をtableタグで整形して表示</h2>
	<table border="1">
		<thead>
			<tr>
				<th>id</th>
				<th>status</th>
				<th>name</th>
				<th>grade</th>
				<th>class</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					<td><?=($row["id"])?></td>
					<td><?=($row["status"])?></td>
					<td><?=($row["name"])?></td>
					<td><?=($row["grade"])?></td>
					<td><?=($row["class"])?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>

</body>
</html>