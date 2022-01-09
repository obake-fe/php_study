<?php declare(strict_types=1);
	$filePath = "php.png";
	header('Content-type: image/png');
	readfile($filePath);
	