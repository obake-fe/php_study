<?php declare(strict_types=1);
	
	$email = filter_input(INPUT_POST, "email");
	$title = filter_input(INPUT_POST, "title");
	$message = filter_input(INPUT_POST, "message");
	
	if (!$email || !$title || !$message) {
		header("Location:index.php");
		exit;
	}

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	
	// mailHogがiso-2022-jpに対応していないためコメントアウト
	// @see https://teratail.com/questions/318732
	
	// /*
	//  * mb_send_mailの第4引数にセットする日本語のエンコード
	//  */
	// function encodeHeader($value): string {
	// 	return mb_encode_mimeheader(
	// 		mb_convert_encoding($value, "ISO-2022-JP", "UTF-8"),
	// 		"ISO-2022-JP",
	// 		"B"
	// 	);
	// }
	
	$header = "From: from@example.com";
	
	
	$message = mb_convert_encoding($message, 'UTF-8');
	$header .= "MIME-Version: 1.0\r\n" . "Content-Transfer-Encoding: 8bit\r\n" . "Content-Type: text/plain; charset=UTF-8\r\n";
	
	$isMailSent = mb_send_mail($email, $title, $message, $header);
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-7</title>
</head>
<body>
	<h2>7. phpのプログラムで自分自身にメールを送ってください</h2>
	<p><?=$isMailSent ? "メールを送信しました。" : "メールは送信できませんでした。"?></p>
	<a href="http://localhost:8025">こちらで確認</a><br><br>
	<a href="index.php">戻る</a>
</body>
</html>