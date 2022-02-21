<?php declare(strict_types=1);
	
	require_once __DIR__ . "/Human2.php";
	
	class Hira extends Human2
	{
		public function __construct(string $name, string $address, int $salary)
		{
			$this->grade = "平社員";
			parent::__construct($name, $address, $salary);
		}
		
	}