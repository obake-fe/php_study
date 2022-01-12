<?php declare(strict_types=1);
class Fruits2 {
	private $fruitsList = ["りんご", "みかん", "いちご", "ぶどう"];
	
	/**
	 * @return string[]
	 */
	public function getFruitsList(int $num): array
	{
		return array_slice($this->fruitsList, 0, $num);
	}
}