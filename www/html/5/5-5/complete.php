<?php declare(strict_types=1);
	
	/*
	 * ファイル名を元に拡張子を返す関数
	 */
	function getExtension(string $file): string {
		return pathinfo($file, PATHINFO_EXTENSION);
	}

	function validate(): array {
		/*
		 * PHPによるエラーを検出する
		 */
		if ($_FILES["image1"]["error"] !== UPLOAD_ERR_OK) {
			return [false, "アップロードエラーを検出しました。"];
		}
		
		/*
		 * ファイル名から拡張子をチェックする
		 */
		if (!in_array(getExtension($_FILES["image1"]["name"]), ["jpg", "jpeg", "png", "gif"])) {
			return ["false", "画像ファイルのみアップロード可能です"];
		}
		
		/*
		 * ファイルの中身を見てMIMEタイプをチェックする
		 */
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mimeType = finfo_file($finfo, $_FILES["image1"]["tmp_name"]);
		finfo_close($finfo);
		if (!in_array($mimeType, ["image/jpeg", "image/png", "image/gif"])) {
			return [false, "不正な画像ファイル形式です"];
		}
		
		/*
		 * ファイルサイズをチェックする
		 */
		if (filesize($_FILES["image1"]["tmp_name"]) > 1024 * 1024 * 2) {
			return [false, "ファイルサイズは2MBまでです。"];
		}
		
		return [true, null];
	}
	
	/*
	 * アップロード後の保存ファイル名を生成して返す関数
	 */
	function generateDestinationPath(): string {
		return date("Ymd-His").random_int(10000, 99999).".".getExtension($_FILES["image1"]["name"]);
	}
	
	/*
	 * HTMLエンティティに変換する関数
	 */
	function escape(string $value): string {
		return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
	}
 
	/*
	 * メインルーチン
	 */
	[$result, $message] = validate();
	if (!$result) {
		echo "[Error]", $message;
		return;
	}

	$destinationPath = generateDestinationPath();
	$moved = move_uploaded_file($_FILES["image1"]["tmp_name"], $destinationPath);
	if (!$moved) {
		echo "アップロード処理中にエラーが発生しました。";
	}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-5</title>
</head>
<body>
	<h2>5. &lt;input type=“file”&gt;を用いて、ユーザが任意のファイルをアップロードするプログラムを作成してください</h2>
	<p>アップロードに成功しました。保存された画像は以下です。</p>
	<img src="<?=$destinationPath?>" style="width: 300px"><br>
	<p>保存ファイル名 : <?=escape($destinationPath)?></p>
	<p>元のファイル名 : <?=escape($_FILES["image1"]["name"])?></p>
	<a href="index.php">戻る</a>
</body>
</html>