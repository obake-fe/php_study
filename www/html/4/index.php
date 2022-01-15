<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>4. SQL</title>
</head>
<body>
	<h1>4. SQL</h1>
	<h2>1. phpmyadminで「test」という名前でデータベースを作成し、そのデータベースに接続するPHPプログラムを記述してください</h2>
	<a href='4-1/index.php' target='_blank' >こちらに実装</a>
	<hr>

	<h2>2. 上記において、1/5の確率でわざと間違ったユーザ名を用いるようにして、成功の場合は「OK」、失敗の場合は「Database Connection Failed」 のみを表示してください。</h2>
	<a href='4-2/index.php' target='_blank' >こちらに実装</a>
	<hr>

	<h2>3. SQL課題.sql をインポートしてください。<br>（ここからPHPは使わずSQLをテキストファイルで残してください）</h2>
	<p>課題ファイルがなかったので自作</p>
	<ul>
		<li><a href="sql/create-database.txt" target="_blank">create-database.txt</a></li>
		<li><a href="sql/create-users-table.txt" target="_blank">create-users-table.txt</a></li>
		<li><a href="sql/create-users_test_data-table.txt" target="_blank">create-users_test_data-table.txt</a></li>
		<li><a href="sql/insert-users.txt" target="_blank">insert-users.txt</a></li>
		<li><a href="sql/insert-users_test_data.txt" target="_blank">insert-users_test_data.txt</a></li>
	</ul>
	<hr>

	<h2>4. usersテーブルを全て出力するselectのSQL</h2>
	<a href="sql/4-4.txt" target="_blank">4-4.txt</a>
	<hr>

	<h2>5. 上記をstatusが0のみに絞り込んで出力するSQL</h2>
	<a href="sql/4-5.txt" target="_blank">4-5.txt</a>
	<hr>

	<h2>6. 上記を学年の降順で出力するSQL</h2>
	<a href="sql/4-6.txt" target="_blank">4-6.txt</a>
	<hr>

	<h2>7. 各クラス(学年と組の組合せ)ごとに何人の生徒がいるか？のSQL</h2>
	<a href="sql/4-7.txt" target="_blank">4-7.txt</a>
	<hr>

	<h2>8. user_test_dataテーブルを全て出力するSQL</h2>
	<a href="sql/4-8.txt" target="_blank">4-8.txt</a>
	<hr>

	<h2>9. 上記を生徒の名前をあわせて出力するSQL</h2>
	<a href="sql/4-9.txt" target="_blank">4-9.txt</a>
	<hr>

	<h2>10. 上記を生徒ごとの合計点を出力するSQL</h2>
	<a href="sql/4-10.txt" target="_blank">4-10.txt</a>
	<hr>

	<h2>11. テスト日ごとに各教科の平均点を出力するSQL</h2>
	<a href="sql/4-11.txt" target="_blank">4-11.txt</a>
	<hr>
</body>
</html>