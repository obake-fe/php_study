<?php declare(strict_types=1);

	class Human {
		
		protected $name;
		protected $address;
		protected $salary;
		
		public function __construct(string $name, string $address, int $salary)
		{
			$this->name = $name;
			$this->address = $address;
			$this->salary = $salary;
		}
		
		protected function getName(): string {
			return $this->name;
		}
		
		protected function getAddress(): string {
			return $this->address;
		}
		
		protected function getSalary(): int {
			return $this->salary * 12;
		}
		
		public function introduce(): array {
			return [$this->getName(), $this->getAddress(), $this->getSalary()];
		}
	}
	
	$human = new Human("tomo", "Tokyo", 30000);
	$info = $human->introduce();

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>5-19</title>
</head>
<body>
	<h2>19. Humanクラスを作成し、インスタンス化してください。<br>初期化時に引数として「名前」「住所」「月収」を渡し、クラスのプロパティとして設定してください。<br>また、プロパティのアクセス権を全てprotectedにしてください</h2>
	<h2>20. HumanクラスにgetName、getAddressメソッドを追加し、名前,住所を取得できるようにしてください</h2>
	<h2>21. HumanクラスにgetSalaryメソッドを作成し、年収（月収*12)を取得できるようにしてください。</h2>
	<h2>22. Humanクラスにintroduceメソッドを作成し、名前、住所、年収を表示する機能を作成してください。その際、上の課題で作成したメソッドを使ってください。<br>作成後、introduceメソッドを実行し実際に表示してみてください</h2>
	<ul>
		<li><?="名前 : {$info[0]}"?></li>
		<li><?="住所 : {$info[1]}"?></li>
		<li><?="年収 : {$info[2]}"?></li>
	</ul>
</body>
</html>

