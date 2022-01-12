<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-23</title>
</head>
<body>
<h1>PHP基礎</h1>
<h2>23. じゃんけんげーむを作ってください。※勝った時と負けた時で背景色を変えてください。</h2>
<p>じゃんけん、、、</p>
<form name="form" action="result.php" method="post">
	<label for="rock">グー</label>
	<input type="radio" name="pon" id="rock" value="rock">
	<label for="scissors">チョキ</label>
	<input type="radio" name="pon" id="scissors" value="scissors">
	<label for="paper">パー</label>
	<input type="radio" name="pon" id="paper" value="paper">
	<button type="submit" name="battle" value="send">送る</button>
</form>
</body>
</html>