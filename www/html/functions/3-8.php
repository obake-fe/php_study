<?php declare(strict_types=1);
class Fruits {
	private $fruitsList = ["りんご", "みかん", "いちご", "ぶどう"];
	
	/**
	 * @return string[]
	 */
	public function getFruitsList(): array
	{
		return $this->fruitsList;
	}
}