<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-12</title>
</head>
<body>
<h2>12. データベースに、メールアドレスとパスワードの2カラムのテーブルを作成し、<br>メアドとパスワードを入力して、一致するものがあるとOK、ないとNGと出すプログラムを作成<br>（パスワードはハッシュ化などせずにそのまま平文で保存）</h2>
	<form action="result.php" method="post">
		<label for="email">email</label>
		<input type="text" name="email" id="email"><br><br>
		<label for="password">password</label>
		<input type="text" name="password" id="password"><br><br>
		<button type="submit" name="operation" value="confirm">確認</button>
	</form>
</body>
</html>