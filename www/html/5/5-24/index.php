<?php declare(strict_types=1);

	require_once __DIR__ . "/Bucho.php";
	require_once __DIR__ . "/Hira.php";
	
	$bucho = new Bucho("田中", "東京", 40);
	$hira = new Hira("鈴木", "大阪", 20);
	
	$bonus = Bucho::getBonus();
	
	$sato = new Bucho("佐藤", "福岡", 40);
	$yoshida = new Hira("吉田", "京都", 20);
	$matsuda = new Hira("松田", "神奈川", 20);
	
	$array = [$sato, $yoshida, $matsuda];

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-24</title>
</head>
<body>
	<h2>24. Humanクラスを継承してBuchoクラス、Hiraクラスを作成してください。</h2>
	<h2>25. Humanクラスに$gradeプロパティを追加して、Hiraクラスに「平社員」Buchoクラスに「部長」を初期値として与えてください。<br>また、getGradeメソッドをHumanクラスに実装し、それぞれのクラスで設定された$gradeの値を返して下さい。<br>また、gradeの表示をintroduceメソッドに追記してください</h2>
	<ul>
		<li><?="{$bucho->getName()} : {$bucho->getGrade()}"?></li>
		<li><?="{$hira->getName()} : {$hira->getGrade()}"?></li>
	</ul>
	
	<h2>26. Buchoクラスのオブジェクト定数BONUSにint型で値を設定してください。<br>また、staticでgetBonusメソッドを作成し、定数の値を取得できるようにしてください</h2>
	<ul>
		<li><?="ボーナス : {$bonus}万円"?></li>
	</ul>
	
	<h2>27. 部長クラスは年２回のボーナスがもらえるものとしてsalaryメソッドをオーバーライドし、実装しなおしてください。<br>その際、HumanクラスのgetSalaryメソッドを利用してください。</h2>
	<ul>
		<li><?="年収 : {$bucho->getSalary()}万円"?></li>
	</ul>
	
	<h2>28. Hiraクラス2つとBuchoクラス1つのインスタンスをもつ配列を作成してください。<br>その配列をループし、それぞれのインスタンスに対してintroduceメソッドを実行してください。<br>その際、HumanクラスのgetSalaryメソッドを利用してください。</h2>
	<table border="1">
		<tr>
			<th>名前</th>
			<th>住所</th>
			<th>年収</th>
			<th>役職</th>
		</tr>
		<?php foreach ($array as $value): ?>
			<tr>
				<td><?=$value->introduce()[0]?></td>
				<td><?=$value->introduce()[1]?></td>
				<td><?=$value->introduce()[2]?></td>
				<td><?=$value->introduce()[3]?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
