<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5. PHP応用</title>
</head>
<body>
	<h1>5. PHP応用</h1>
	<h2>2. ある URL (http://news.finance.yahoo.co.jp/detail.html) の前半を取り除いて、<br>ファイル名のみや、ディレクトリ名のみにして画面に表示するプログラムを作成してください。</h2>
	<ul>
		<li>http://news.finance.yahoo.co.jp/detail.html → detail.html</li>
		<li>http://news.finance.yahoo.co.jp/ → news.finance.yahoo.co.jp</li>
		<li>http://news.finance.yahoo.co.jp → news.finance.yahoo.co.jp</li>
		<li>http://news.finance.yahoo.co.jp/hoge/piyo/ → piyo</li>
	</ul>
	<p>※上記のどのURLを入れても、想定した結果がひとつ出力されるようにしてください。</p>
	<form action="5-1/index.php" method="get">
		<label for="reg">input here : </label>
		<input type="text" name="url" id="reg">
		<button type="submit" name="translate" value="translate">translate</button>
	</form>
	<hr>
</body>
</html>