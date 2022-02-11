<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../DB.php";
	
	/*
	 * redirect top if value is empty
	 */
	if(!isset($_GET["id"]) || trim($_GET["id"]) === "") {
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
		$statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
		$statement->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
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
	<title>4-21</title>
</head>
<body>
	<?php if (!$statement->rowCount()) { ?>
		<p><?="{$_GET["id"]}はデータが存在しないidです。"?></p>
	<?php } ?>
	<h2><?=$phpStudyDB->escape($row["name"])?>の名前を変更する。</h2>
	<form name="form" action="update.php" method="post">
		<label for="name">Enter update name: </label>
		<input type="text" name="name" id="name">
		<input type="hidden" name="id" value="<?=$_GET["id"]?>">
		<button type="submit" name="update" value="update">update</button>
	</form>
</body>
</html>