<?php declare(strict_types=1);
	
	require_once __DIR__ . "/Human2.php";

class Bucho extends Human2
	{
		private const BONUS = 30;
		
		public function __construct(string $name, string $address, int $salary)
		{
			$this->grade = "部長";
			parent::__construct($name, $address, $salary);
		}
		
		public static function getBonus(): int
		{
			return self::BONUS;
		}
	}