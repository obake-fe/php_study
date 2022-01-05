<?php
function createFruitsArray2(int $num): array {
	$fruitsArray = ["りんご", "みかん", "いちご", "ぶどう"];
	return array_slice($fruitsArray, 0, $num);
}