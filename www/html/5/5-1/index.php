<?php declare(strict_types=1);

$url= filter_input(INPUT_GET, "url");

if (!$url) {
	header("Location:../index.php");
	exit;
}

$pattern1 = "/^(http:\/\/news.finance.yahoo.co.jp)(\/.*)\/(.*)\//";
$pattern2 = "/^(http:\/\/news.finance.yahoo.co.jp)\/(.+)/";
$pattern3 = "/^(http:\/\/)(news.finance.yahoo.co.jp)(.*)/";
$replace1 = "$3";
$replace2 = "$2";
$replace3 = "$2";

if(preg_match($pattern1, $url)) {
	$content = preg_replace($pattern1, $replace1, $url);
} elseif (preg_match($pattern2, $url)) {
	$content = preg_replace($pattern2, $replace2, $url);
} elseif (preg_match($pattern3, $url)) {
	$content = preg_replace($pattern3, $replace3, $url);
} else {
	$content = "対象外の文字列です";
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-1</title>
</head>
<body>
	<h2>2. ある URL (http://news.finance.yahoo.co.jp/detail.html) の前半を取り除いて、<br>ファイル名のみや、ディレクトリ名のみにして画面に表示するプログラムを作成してください。</h2>
	<ul>
		<li>http://news.finance.yahoo.co.jp/detail.html → detail.html</li>
		<li>http://news.finance.yahoo.co.jp/ → news.finance.yahoo.co.jp</li>
		<li>http://news.finance.yahoo.co.jp → news.finance.yahoo.co.jp</li>
		<li>http://news.finance.yahoo.co.jp/hoge/piyo/ → piyo</li>
	</ul>
	<p>※上記のどのURLを入れても、想定した結果がひとつ出力されるようにしてください。</p>
	<p>入力した値 : <?=$url?></p>
	<p>変換後の値 : <?=$content?></p>
	<a href="./index.php">戻る</a>
</body>
</html>