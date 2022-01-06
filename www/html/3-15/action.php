<?php declare(strict_types=1);
//(2) action.php : postのaction先。テキストボックスの内容をCookieに保存する

function escape($value): string {
	return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
}
if (!isset($_GET["subscribe"])) {
	echo "Not Permitted";
	return;
}

$textValue = escape($_GET["name"]);
setcookie("name", $textValue, time() + 60 * 60, "/", "", false, true);

header("Location:view.php", true, 307);