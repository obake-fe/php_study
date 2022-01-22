<?php declare(strict_types=1);

	function encodeStringToSJIS () {
		$txt = file("shiftjs.txt");
		$convertedText = "";
		
		foreach ($txt as $value) {
			$convertedText .= mb_convert_encoding($value, "UTF-8", "SJIS-win");
		}
		
		return $convertedText;
	}
	
	function encodeVariablesToSJIS () {
		$txt = file("shiftjs.txt");
		$convertedText = "";
		
		mb_convert_variables("UTF-8", "SJIS-win", $txt);
		foreach ($txt as $value) {
			$convertedText .= $value;
		}
		
		return $convertedText;
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-3</title>
</head>
<body>
	<h2>3. 文字コードについて調べ、SJIS から UTF-8 にエンコーディングを変換する プログラムを作成してください。<br>・画面でもファイルでもいいので、文字コードが変換されていることが確認できる手段を用意しておく。</h2>
	<h3>変換前の文字列</h3>
	<p><?=var_dump(file("shiftjs.txt"))?></p>
	<p></p>
	<h3>変換後の文字列</h3>
	<p><?="use mb_convert_encoding : ".encodeStringToSJIS()?></p>
	<p><?="use mb_convert_variables : ".encodeVariablesToSJIS()?></p>
</body>
</html>