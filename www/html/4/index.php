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
		<li><a href="sql/create-database.sql" target="_blank">create-database.sql</a></li>
		<li><a href="sql/create-users-table.sql" target="_blank">create-users-table.sql</a></li>
		<li><a href="sql/create-users_test_data-table.sql" target="_blank">create-users_test_data-table.sql</a></li>
		<li><a href="sql/insert-users.sql" target="_blank">insert-users.sql</a></li>
		<li><a href="sql/insert-users_test_data.sql" target="_blank">insert-users_test_data.sql</a></li>
	</ul>
	<hr>

	<h2>4. usersテーブルを全て出力するselectのSQL</h2>
	<a href="sql/4-4.sql" target="_blank">4-4.sql</a>
	<hr>

	<h2>5. 上記をstatusが0のみに絞り込んで出力するSQL</h2>
	<a href="sql/4-5.sql" target="_blank">4-5.sql</a>
	<hr>

	<h2>6. 上記を学年の降順で出力するSQL</h2>
	<a href="sql/4-6.sql" target="_blank">4-6.sql</a>
	<hr>

	<h2>7. 各クラス(学年と組の組合せ)ごとに何人の生徒がいるか？のSQL</h2>
	<a href="sql/4-7.sql" target="_blank">4-7.sql</a>
	<hr>

	<h2>8. user_test_dataテーブルを全て出力するSQL</h2>
	<a href="sql/4-8.sql" target="_blank">4-8.sql</a>
	<hr>

	<h2>9. 上記を生徒の名前をあわせて出力するSQL</h2>
	<a href="sql/4-9.sql" target="_blank">4-9.sql</a>
	<hr>

	<h2>10. 上記を生徒ごとの合計点を出力するSQL</h2>
	<a href="sql/4-10.sql" target="_blank">4-10.sql</a>
	<hr>

	<h2>11. テスト日ごとに各教科の平均点を出力するSQL</h2>
	<a href="sql/4-11.sql" target="_blank">4-11.sql</a>
	<hr>

	<h2>12. 各クラス、試験日ごとに「教科ごとの平均」と「合計点の平均」を出力するSQL</h2>
	<a href="sql/4-12.sql" target="_blank">4-12.sql</a>
	<hr>

	<h2>13. users テーブルに一行追加するSQL</h2>
	<a href="sql/4-13.sql" target="_blank">4-13.sql</a>
	<hr>

	<h2>14. users テーブルの一行を変更（名前の更新を）するSQL</h2>
	<a href="sql/4-14.sql" target="_blank">4-14.sql</a>
	<hr>

	<h2>15. users テーブルの一行を削除するSQL</h2>
	<a href="sql/4-15.sql" target="_blank">4-15.sql</a>
	<hr>

	<h2>16. 以下を説明してください。</h2>
	<h3>（プライマリ）キーについて</h3>
	<p>レコードを一意に判別するためのカラム。ユニークな値を持つ。</p>
	<h3>型について</h3>
	<p>省略</p>
	<h3>JOINについて（外部結合と内部結合の違いも）</h3>
	<h4>内部結合</h4>
	<p>それぞれのテーブルの指定したカラムの値が一致するものだけを結合する。</p>
	<p>ベースとなるテーブルから、条件にマッチするレコードがないものは削除される。</p>
	<h4>外部結合</h4>
	<p>内部結合のようにそれぞれのテーブルの指定したカラムの値が一致するものを結合するのに加え、どちらかのテーブルにしか存在しないものに関しても取得する。</p>
	<h3>副問合せ文について</h3>
	<p>あるselect文の結果を別のSQL文で利用する文。</p>
	<p></p>
	<hr>

	<h2>17. usersテーブルを全て出力するselectのSQLをPHPから実行し、結果をtableタグで整形して表示</h2>
	<a href="4-17/index.php" target="_blank">こちらに実装</a>
	<hr>

	<h2>18. user_idを入力してユーザ情報とテスト結果を表示する<br>→存在しないuser_idなら存在しませんとメッセージを表示<br>→テスト結果がなければテスト受けてませんとメッセージを表示</h2>
	<a href="4-18/index.html" target="_blank">こちらに実装</a>
	<hr>

	<h2>19. 上記を、ユーザ一覧を表示し、クリックするとユーザ情報とテスト結果が表示されるように改修</h2>
	<a href="4-19/index.php" target="_blank">こちらに実装</a>
	<hr>

	<h2>20. テストが実施された日付一覧を表示し、クリックするとその日のテスト結果を表示</h2>
	<a href="4-20/index.php" target="_blank">こちらに実装</a>
	<hr>

	<h2>21. ユーザ情報（名前のみでOK）の更新ができるように改修（別画面に遷移させて）</h2>
	<a href="4-21/index.php" target="_blank">こちらに実装</a>
</body>
</html>