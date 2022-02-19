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
	}
	
	$human = new Human("tomo", "Tokyo", 30000);

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
</body>
</html>

