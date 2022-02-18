<?php declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";

	session_start();
	
	// POSTされたトークンを取得
	$token = $_POST["token"] ?? "";
	
	// セッション変数のトークンを取得
	$session_token = $_SESSION["token"] ?? "";
	
	$message = "topに戻ってください";
	
	if($token !== "" && $token === $session_token) {
		// セッション変数のトークンを削除
		unset($_SESSION["token"]);
		
		/*
		 * check require value
		 */
		function validate(): bool {
			return $_POST["author"] !== "" && $_POST["message"] !== "";
		}
		
		if (isset($_POST["operation"]) && $_POST["operation"] === "submit") {
			
			if (!validate()) {
				$message = "author・messageのいずれも必須入力です。";
				
			} else {
				
				/*
				 * try to extract data
				 */
				try {
					$phpStudyDB = new UsersDB();
					$pdo = $phpStudyDB->connectDB();
					
					$statement = $pdo->prepare("INSERT INTO php_study.posts_table (author, message) VALUES (:author, :message)");
					$statement->bindValue(":author", $_POST["author"], PDO::PARAM_STR);
					$statement->bindValue(":message", $_POST["message"], PDO::PARAM_STR);
					$statement->execute();
					
					$message =  "投稿に成功しました。";
					
				} catch (PDOException $e) {
					$message =  "投稿に失敗しました。";
				}
			}
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
	<title>5-18</title>
</head>
<body>
	<p><?=$message?></p>
	<a href="index.php">topに戻る</a>
</body>
</html>
