<?php
	declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	/*
	 * check require value
	 */
	function validate(): bool {
		return $_POST["email"] !== "" && $_POST["password"] !== "";
	}
	
	/*
	 * session delete
	 */
	function deleteSession() {
		if(ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
	}
	
	session_start();
	
	if (isset($_POST["operation"]) && $_POST["operation"] === "login") {
		if (!validate()) {
			$message = "メールアドレス・パスワードのいずれも必須入力です。";
			$data = [
				"email" => $_POST["email"],
				"password" => $_POST["password"]
			];
		} else {
			
			/*
			 * try to connect DB
			 */
			try {
				$phpStudyDB = new UsersDB();
				$pdo = $phpStudyDB->connectDB();
			} catch (PDOException $e) {
				$message =  "DB接続に失敗しました。";
			}
			
			/*
			 * try to extract data
			 */
			try {
				$statement = $pdo->prepare("SELECT * FROM php_study.idpassHash WHERE mail = :mail");
				$statement->bindValue(":mail", $_POST["email"], PDO::PARAM_STR);
				// $statement->bindValue(":password", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);
				$statement->execute();
				$user = $statement->fetch(PDO::FETCH_ASSOC);
				
				$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
				
				//認証処理
				if(password_verify($_POST['password'], $user["password"])){
					$_SESSION["data"] = [
						"name" => $user["name"],
						"email" => $_POST["email"],
						"password" => $_POST["password"]
					];
					header("Location: main.php");
					return;
				}
				
				$message =  "ログインに失敗しました。";
			} catch (PDOException $e) {
				$message =  "データの比較に失敗しました。";
			}
		}
	} elseif (isset($_SESSION["data"])) {
		$data = [
			"email" => $_SESSION["data"]["email"],
			"password" => $_SESSION["data"]["password"]
		];

		$_SESSION = [];
		deleteSession();
		session_destroy();
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-16</title>
</head>
<body>
<h2>16. ログアウト機能や、パスワードのハッシュ化を行うなど、ログイン機能を自分なりに完成させてください</h2>
	<?php if (isset($message)): ?>
		<p style="color:red"><?=$message?></p>
	<?php endif; ?>
	<form action="" method="post">
		<label for="email">email</label>
		<input type="text" name="email" id="email" value="<?= $data["email"] ?? "" ?>"><br><br>
		<label for="password">password</label>
		<input type="password" name="password" id="password" value="<?= $data["password"] ?? "" ?>"><br><br>
		<button type="submit" name="operation" value="login">ログイン</button>
	</form>
	<hr>
	<a href="signUp.php">アカウントを新規登録する場合はこちら</a>
</body>
</html>