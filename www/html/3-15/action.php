<?php declare(strict_types=1);
//(2) action.php : postのaction先。テキストボックスの内容をCookieに保存する

setcookie("name", $_GET["name"], time() + 60 * 60, "/", "", false, true);
header("Location:view.php", true, 307);