<?php declare(strict_types=1);
	
	class Human2 {
		
		protected $name;
		protected $address;
		protected $salary;
		protected $grade;
		
		public function __construct(string $name, string $address, int $salary)
		{
			$this->name = $name;
			$this->address = $address;
			$this->salary = $salary;
		}
		
		public function getName(): string {
			return $this->name;
		}
		
		public function getAddress(): string {
			return $this->address;
		}
		
		public function getSalary(): int {
			return $this->salary * 12;
		}
		
		public function getGrade(): string {
			return $this->grade;
		}
		
		public function introduce(): array {
			return [$this->getName(), $this->getAddress(), $this->getSalary(), $this->getGrade()];
		}
		
		public function moving(string $address): void {
			$this->address = $address;
		}
	}