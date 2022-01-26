<?php declare(strict_types=1);

	/*
	 * session delete for 5-4
	 */
	function deleteSession() {
		if(ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
	}
	session_start();
	$_SESSION = [];
	deleteSession();
	session_destroy();
?>
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
	<form action="5-2/index.php" method="get">
		<label for="reg">input here : </label>
		<input type="text" name="url" id="reg">
		<button type="submit" name="translate" value="translate">translate</button>
	</form>
	<hr>
	
	<h2>3. 文字コードについて調べ、SJIS から UTF-8 にエンコーディングを変換する プログラムを作成してください。<br>・画面でもファイルでもいいので、文字コードが変換されていることが確認できる手段を用意しておく。</h2>
	<a href="5-3/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>4. 血液型を選択してボタンをクリックすると確認画面に遷移し、確認画面で「戻る」ボタンを押して前画面に戻ると、<br>確認画面に遷移した際に選択していた血液型が選択されている状態で戻ってくるページを作成してください。<br>・血液型は select - option で選択します。<br>・sessionを使用してください。</h2>
	<a href="5-4/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>5. &lt;input type=“file”&gt;を用いて、ユーザが任意のファイルをアップロードするプログラムを作成してください</h2>
	<h2>6. 上記において、保存ディレクトリのパスを defineを用いて記述してください</h2>
	<a href="5-5/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>7. phpのプログラムで自分自身にメールを送ってください</h2>
	<a href="5-7/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>8. SQL課題で作成したユーザ情報編集機能について、<br>select - option を用いステータスの更新もできるように改修、<br>ついでに確認画面を挟んで登録するようにしてください</h2>
	<a href="5-8/index.php" target="_blank">こちらに実装</a>
	<hr>
</body>
</html>