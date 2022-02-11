<?php declare(strict_types=1);
	if (!isset($_POST["battle"]) || !array_key_exists("pon", $_POST)) {
		header("Location:index.php");
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
	$text = null;
	if (
	($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "scissors") ||
	($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "paper") ||
	($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "rock")
	) {
		$result = "win";
		$text = "<p>勝ち</p>";
	} elseif (
	($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "paper") ||
	($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "rock") ||
	($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "scissors")
	) {
		$result = "lose";
		$text = "<p>負け</p>";
	} elseif (
	($_POST["pon"] === "rock" && array_keys($cpu_pon)[0] === "rock") ||
	($_POST["pon"] === "scissors" && array_keys($cpu_pon)[0] === "scissors") ||
	($_POST["pon"] === "paper" && array_keys($cpu_pon)[0] === "paper")
	) {
		$result = "draw";
		$text = "<p>あいこ</p>";
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-23</title>
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
	?>
	<a href="index.php">戻る</a>
</body>
</html>
