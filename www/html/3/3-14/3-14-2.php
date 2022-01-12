<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<?php
		function escape($value): string {
			return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
		}
		if (!isset($_POST["subscribe"])) {
			echo "Not Permitted";
			return;
		}
	?>
	<h1>POST Success!</h1>
	<p>email : <?=escape($_POST["email"])?></p>
</body>
</html>
