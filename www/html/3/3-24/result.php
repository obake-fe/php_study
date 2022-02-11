<?php declare(strict_types=1);
	session_start();
	// じゃんけんの値が送信されていない場合は元のページに遷移する。
	if (!isset($_POST["battle"]) || !array_key_exists("pon", $_POST)) {
		header("Location:index.php");
		return;
	}
	
	$pon_list = array(
		["rock" => "グー"],
		["scissors" => "チョキ"],
		["paper" => "パー"]
	);
	
	try {
		$cpu_pon = $pon_list[random_int(0, 2)];
	} catch (Exception $e) {
		var_dump($e->getMessage());
	}
	
	$result = null;
	$text = "<p>結果 : リロードはカウントされません</p>";
	$winCount = array_key_exists("winCount", $_COOKIE) ? $_COOKIE["winCount"] : 0;
	$loseCount = array_key_exists("loseCount", $_COOKIE) ? $_COOKIE["loseCount"] : 0;
	$drawCount = array_key_exists("drawCount", $_COOKIE) ? $_COOKIE["drawCount"] : 0;
	
	// POSTされたトークンを取得
	$token = $_POST["token"] ?? "";
	
	// セッション変数のトークンを取得
	$session_token = $_SESSION["token"] ?? "";
	
	// POSTされたトークンとセッション変数のトークンの比較
	if($token !== "" && $token === $session_token) {
		// セッション変数のトークンを削除
		unset($_SESSION["token"]);
		// 勝ちの場合
		if (
			($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "scissors") ||
			($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "paper") ||
			($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "rock")
		) {
			$result = "win";
			$text = "<p>結果 : 勝ち</p>";
			if (array_key_exists("winCount", $_COOKIE)) {
				$winCount = +$_COOKIE["winCount"] + 1;
			} else {
				$winCount = 1;
			}
			setcookie("winCount", (string)$winCount, time() + 60 * 60, "/", "", false, true);
		} elseif (
			
			// 負けの場合
			($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "paper") ||
			($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "rock") ||
			($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "scissors")
		) {
			$result = "lose";
			$text = "<p>結果 : 負け</p>";
			if (array_key_exists("loseCount", $_COOKIE)) {
				$loseCount = +$_COOKIE["loseCount"] + 1;
			} else {
				$loseCount = 1;
			}
			setcookie("loseCount", (string)$loseCount, time() + 60 * 60, "/", "", false, true);
		} elseif (
			
			// あいこの場合
			($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "rock") ||
			($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "scissors") ||
			($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "paper")
		) {
			$result = "draw";
			$text = "<p>結果 : あいこ</p>";
			if (array_key_exists("drawCount", $_COOKIE)) {
				$drawCount = +$_COOKIE["drawCount"] + 1;
			} else {
				$drawCount = 1;
			}
			setcookie("drawCount", (string)$drawCount, time() + 60 * 60, "/", "", false, true);
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
	<title>3-24</title>
	<style>
		.body {
			<?php if ($result === "win") { ?>
				background-color: lightpink;
			<?php } elseif ($result === "lose") { ?>
				background-color: lightskyblue;
			<?php } elseif ($result === "draw") { ?>
				background-color: lightgreen;
			<?php }?>
		}
	</style>
</head>
<body class="body">
	<?php
		$self_pon_ja = null;
		foreach ($pon_list as $pon) {
			if (array_keys($pon)[0] === $_POST["pon"]) {
				$self_pon_ja = array_values($pon)[0];
			}
		}
		$cpu_pon_ja = array_values($cpu_pon)[0];
		echo "<p>自分 : {$self_pon_ja}</p><p>相手 : {$cpu_pon_ja}</p>$text";
		echo "<p>通算 : <span>勝ち {$winCount}回, </span><span>負け {$loseCount}回, </span><span>あいこ {$drawCount}回</span></p>";
	?>
	<a href="index.php">戻る</a>
</body>
</html>
