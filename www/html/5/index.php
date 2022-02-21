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
	
	<h2>9. さらにユーザの新規追加や削除もできる画面なり機能なりを追加</h2>
	<a href="5-9/addForm.php" target="_blank">新規追加</a><br>
	<a href="5-9/deleteForm.php" target="_blank">削除</a>
	<hr>
	
	<h2>10. さらにユーザ名にHTMLが含まれても表示崩れがおきないように改修</h2>
	<a href="5-10/addForm.php" target="_blank">新規追加</a><br>
	<a href="5-10/deleteForm.php" target="_blank">削除</a>
	<hr>
	
	<h2>11. さらにユーザ名にシングルクォーテーションが入れられても更新ができるように改修</h2>
	<p>10と同様</p>
	<hr>
	
	<h2>12. データベースに、メールアドレスとパスワードの2カラムのテーブルを作成し、<br>メアドとパスワードを入力して、一致するものがあるとOK、ないとNGと出すプログラムを作成<br>（パスワードはハッシュ化などせずにそのまま平文で保存）</h2>
	<a href="5-12/create-idpass-table.sql" target="_blank">create-idpass-table.sql</a><br>
	<a href="5-12/insert-users_idpass.sql" target="_blank">insert-users_idpass.sql</a><br>
	<a href="5-12/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>13. 上記の画面をlogin.phpとし、ログイン成功後、メアドをSessionに保存してください</h2>
	<a href="5-13/login.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>14. main.phpを用意し、アクセスするとログイン時はそのまま表示、未ログイン時はlogin.phpにリダイレクトとしてください</h2>
	<a href="5-14/main.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>15. SQLインジェクションによる攻撃例をデモしてください</h2>
	<a href="5-15/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>16. ログアウト機能や、パスワードのハッシュ化を行うなど、ログイン機能を自分なりに完成させてください</h2>
	<a href="5-16/login.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>17. 投稿ID：entry_id(Auto Increment)<br>
		投稿者名：author<br>
		投稿本文：message<br>
		投稿日時：post_date<br>
		の4カラムのテーブルを作成してください</h2>
	<a href="5-17/posts_table.sql" target="_blank">posts_table.sql</a>
	<hr>
	
	<h2>18. テキストボックスとテキストエリアを用い、上記にデータが挿入されるプログラムを記述</h2>
	<a href="5-18/index.php" target="_blank">こちらに実装</a>
	<hr>
	
	<h2>19. Humanクラスを作成し、インスタンス化してください。<br>初期化時に引数として「名前」「住所」「月収」を渡し、クラスのプロパティとして設定してください。<br>また、プロパティのアクセス権を全てprotectedにしてください</h2>
	<h2>20. HumanクラスにgetName、getAddressメソッドを追加し、名前,住所を取得できるようにしてください</h2>
	<h2>21. HumanクラスにgetSalaryメソッドを作成し、年収（月収*12)を取得できるようにしてください。</h2>
	<h2>22. Humanクラスにintroduceメソッドを作成し、名前、住所、年収を表示する機能を作成してください。その際、上の課題で作成したメソッドを使ってください。<br>作成後、introduceメソッドを実行し実際に表示してみてください</h2>
	<h2>23. Humanクラスにmovingメソッドを作成し、インスタンス化後に住所を変更できるようにしてください。<br>movingメソッドの実行前後にintroduceメソッドを実行し、結果を確認してください</h2>
	<a href="5-19/index.php" target="_blank">こちらに実装</a>
	<hr>
</body>
</html>