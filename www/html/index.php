<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1>PHP基礎</h1>
	<h2>1. index.phpという名前でファイルを作成し、PHPを使用して、「Hello World」と出力してくださいね。</h2>
  <p><?php echo "Hello World" ?></p>
	<hr>
	
	<h2>2. $nameという変数にあなたの名前を代入し、 ようこそ[あなたの名前]さん と出力してください。</h2>
	<?php $name = "朝長大地"; ?>
  <p><?php echo "ようこそ".$name."さん"; ?></p>
	<hr>
	
	<h2>3. ループを使って1から30まで表示してください。</h2>
	<p><?php for($i = 1; $i <= 30; $i++) {
		echo $i." ";
	}?></p>
	<hr>
	
	<h2>4. 上記で10と11の間、20と21の間に"br"タグを用いて改行して表示してください。</h2>
	<p><?php for($i = 1; $i <= 30; $i++):
		echo $i." ";
		if($i === 10 || $i === 20): ?>
			<br>
		<?php endif;
	endfor;?></p>
	<hr>

	<h2>5. 今日の日付を表示してください。<br>昨日の日付も表示するプログラムを作ってください。<br>明日の日付、1週間前の日付、1週間後日付などもチャレンジ。</h2>
	<?php date_default_timezone_set("Asia/Tokyo"); ?>
	<p><?php echo "今日の日付 : ".date("Y/m/d") ?></p>
	<p><?php echo "昨日の日付 : ".date("Y/m/d", strtotime('-1 day')) ?></p>
	<p><?php echo "明日の日付 : ".date("Y/m/d", strtotime('+1 day')) ?></p>
	<p><?php echo "1週間前の日付 : ".date("Y/m/d", strtotime('-1 week')) ?></p>
	<p><?php echo "1週間後の日付 : ".date("Y/m/d", strtotime('+1 week')) ?></p>
	<hr>

	<h2>6. 「りんご」「みかん」「いちご」の配列を作って、ループさせて表示してください。</h2>
	<?php $fruits = ["りんご", "みかん", "いちご"] ?>
	<p><?php foreach ($fruits as $fruit) {
		echo $fruit;
	}
	unset($fruit);
	?></p>
	<hr>

	<h2>7. 上記でループさせて表示後、配列に「ぶどう」を追加し、ループさせて表示してください。<br>（3つ表示と、4つ表示を１回ずつ）</h2>
	<p><?php foreach ($fruits as $fruit) {
			echo $fruit;
		} unset($fruit); ?></p>
	<?php $fruits[] = "ぶどう" ?>
	<p><?php foreach ($fruits as $fruit) {
			echo $fruit;
		} unset($fruit); ?></p>
	<hr>

	<h2>8. 「りんご」「みかん」「いちご」「ぶどう」の配列を返す関数を作成してください。</h2>
	<?php require_once __DIR__."/functions/3-8.php"?>
	<p><?php print_r(createFruitsArray()); ?></p>
	<hr>

	<h2>9. 上記を引数で取得する個数を指定する関数に変更してください。<br>（引数で2を与えると「りんご」「みかん」の配列が返される）</h2>
	<?php require_once __DIR__."/functions/3-9.php"?>
	<p><?php print_r(createFruitsArray2(2)); ?></p>
	<hr>

	<h2>10. 引数で与えられた配列をループして表示する関数を作成してください。</h2>
	<?php require_once __DIR__."/functions/3-10.php"?>
	<p><?php showArrayValue($fruits); ?></p>
	<hr>
	
	<h2>11. 作成した関数のみを別ファイルで保存し、require_onceを用いて読み込んでください。</h2>
	<hr>
	
	<h2>12. keyが「Apple」「Orange」「Grape」で、valueが「りんご」「みかん」「ぶどう」という連想配列をループさせて表示してください。</h2>
	<?php
		$fruitsArray = [
			"Apple" => "りんご",
			"Orange" => "みかん",
			"Grape" => "ぶどう"
		];
	?>
	<p>
		<?php foreach ($fruitsArray as $key1 => $value1) {
			echo "<p>{$key1} : {$value1}</p>";
		} unset($key1, $value1); ?>
	</p>
	<hr>
	
	<h2>13. keyが「en」「ja」で、valueが「Apple」「りんご」の連想配列を（「みかん」「ぶどう」も同形式で）配列としてもつ2次元配列を1次元目をループさせて表示してください。</h2>
	<?php
		$multiFruitsArray = [
			[
				"en" => "Apple",
				"ja" => "りんご"
			],
			[
				"en" => "Orange",
				"ja" => "みかん"
			],
			[
				"en" => "Grape",
				"ja" => "ぶどう"
			]
		]
	?>
	<p>
		<?php
			foreach ($multiFruitsArray as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					echo "<p>{$key2} : {$value2}</p>";
				}
			}
			unset($key1, $value1, $key2, $value2);
		?>
	</p>
</body>
</html>