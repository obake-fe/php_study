<?php
	declare(strict_types=1);
	
	require_once __DIR__ . "/../UsersDB.php";
	
	/*
	 * check require value
	 */
	function validate(): bool {
		return $_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["password"] !== "";
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
	
	if (isset($_POST["operation"]) && $_POST["operation"] === "signup") {
		if (!validate()) {
			$message = "名前、メールアドレス・パスワードのいずれも必須入力です。";
			$data = [
				"name" => $_POST["name"],
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
				$statement = $pdo->prepare("INSERT INTO php_study.idpassHash (mail, password, name) VALUES (:mail, :password, :name)");
				$statement->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
				$statement->bindValue(":mail", $_POST["email"], PDO::PARAM_STR);
				$statement->bindValue(":password", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);
				$statement->execute();
				
				$_SESSION["data"] = [
					"name" => $_POST["name"],
					"email" => $_POST["email"],
					"password" => $_POST["password"]
				];
				
				header("Location:main.php");
			} catch (PDOException $e) {
				$message =  "データの登録に失敗しました。";
			}
		}
	} elseif (isset($_SESSION["data"])) {
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
	<h3>アカウント登録</h3>
	<form action="" method="post">
		<label for="name">name</label>
		<input type="text" name="name" id="name" value="<?= $data["name"] ?? "" ?>"><br><br>
		<label for="email">email</label>
		<input type="text" name="email" id="email" value="<?= $data["email"] ?? "" ?>"><br><br>
		<label for="password">password</label>
		<input type="password" name="password" id="password" value="<?= $data["password"] ?? "" ?>"><br><br>
		<button type="submit" name="operation" value="signup">登録</button>
	</form>
</body>
</html>