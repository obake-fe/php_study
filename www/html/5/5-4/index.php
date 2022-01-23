<?php declare(strict_types=1);
	session_start();
	$selected = $_SESSION["data"]["bloodType"];
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
	<h2>4. 血液型を選択してボタンをクリックすると確認画面に遷移し、確認画面で「戻る」ボタンを押して前画面に戻ると、<br>確認画面に遷移した際に選択していた血液型が選択されている状態で戻ってくるページを作成してください。<br>・血液型は select - option で選択します。<br>・sessionを使用してください。</h2>
	<form action="confirm.php" method="post">
		<label for="type">choose your blood type : </label>
		<select name="type" id="type">
			<option value="A" <?php if($selected === "A"){echo("selected");}?>>A</option>
			<option value="B" <?php if($selected === "B"){echo("selected");}?>>B</option>
			<option value="O" <?php if($selected === "O"){echo("selected");}?>>O</option>
			<option value="AB" <?php if($selected === "AB"){echo("selected");}?>>AB</option>
		</select>
		<button type="submit" name="button" value="confirm">確認</button>
	</form>
</body>
</html>