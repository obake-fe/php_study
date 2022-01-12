<?php declare(strict_types=1);
class Fruits3 {
	public function showArray(array $array): void {
		foreach ($array as $value) {
			echo $value;
		}
	}
}