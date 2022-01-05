<?php declare(strict_types=1);
function createFruitsArray2(int $num): array {
	$fruitsArray = ["りんご", "みかん", "いちご", "ぶどう"];
	return array_slice($fruitsArray, 0, $num);
}