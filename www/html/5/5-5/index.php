<?php declare(strict_types=1);

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
	<form action="complete.php" method="post" enctype="multipart/form-data">
		<!-- アップロード上限サイズは2MB -->
		<input type="hidden" name="max_file_size" value="2097152">
		<p>
			■アップロードファイルを選択（画像ファイルのみ、2MBまで）<br>
			<input type="file" name="image1"><br><br>
			<button type="submit" name="operation" value="upload">アップロード</button>
		</p>
	</form>
</body>
</html>