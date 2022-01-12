<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-17</title>
</head>
<body>
	<h1>PHP基礎</h1>
	<h2>17. CSV ファイルを読み込んで、HTMLのTABLEタグで整形して、ブラウザに表示するプログラムを作ってください。<br>(CSV ファイルは自分で作成。)</h2>
	<?php
		$csv = new SplFileObject("test.csv");
		$csv->setFlags(SplFileObject::READ_CSV);
	
		$csvArray = [];
		foreach ($csv as $item) {
//			mb_convert_variables("UTF-8", "SJIS-win", $item);
			$csvArray[] = $item;
		}
		unset($item);
	?>
	<table border="1">
		<thead>
			<tr>
				<th><?=$csvArray[0][0]?></th>
				<th><?=$csvArray[0][1]?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($csvArray as $index => $item) {
					if ($index !== 0) {
						echo "<tr><td>{$item[0]}</td><td>{$item[1]}</td></tr>";
					}
				}
				unset($item);
			?>
		</tbody>
	</table>
</body>
</html>