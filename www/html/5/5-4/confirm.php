<?php declare(strict_types=1);
	
	$bloodType = filter_input(INPUT_POST, "type");
	
	if (!$bloodType) {
		header("Location:index.php");
		exit;
	}
	
	session_start();
	
	$_SESSION["data"] = [
		"bloodType" => $bloodType
	];
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-4</title>
</head>
<body>
	<p>your blood type is "<?=$bloodType?>"</p>
	<a href="index.php">戻る</a>

</body>
</html>