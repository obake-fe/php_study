<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>3-20</title>
</head>
<body>
<h1>PHP基礎</h1>
<h2>20. アクセスされているブラウザがIEなのかChromeなのか、またPCなのかスマホなのかを判別してください<br>（FireMobileSimulatorを使用して確認）</h2>
<p>
	<?php
		$ua = getenv('HTTP_USER_AGENT');
		if ((strpos($ua, 'iPhone') !== false) || ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false))) {
			echo "You use smartphone";
		} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
			echo "You use tablet";
		} elseif (strpos($ua, 'Edge') !== false || strpos($ua, 'Edg')) {
			echo "You use Microsoft Edge";
		} elseif (strpos($ua, 'Trident') !== false || strpos($ua, 'MSIE')) {
			echo "You use Microsoft Internet Explore™™™r";
		} elseif (strpos($ua, 'OPR') || strpos($ua, 'Opera')) {
			echo "You use Opera";
		} elseif (strpos($ua, 'Chrome')) {
			echo "You use Google Chrome";
		} elseif (strpos($ua, 'Firefox')) {
			echo "You use Firefox";
		} elseif (strpos($ua, 'Safari')) {
			echo "You use Safari";
		} else {
			echo "Unknown";
		}
	?>
</p>
</body>
</html>