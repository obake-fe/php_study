<?php declare(strict_types=1);
	
	class DB {
		
		/**
		 * connect php_study DB
		 * @return void
		 */
		public function connectDB(): PDO {
			$dsn = "mysql:host=db; dbname=php_study; charset=utf8mb4";
			$user = "root";
			$password = "secret";
			
			try {
				$pdo = new PDO($dsn, $user, $password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				return $pdo;
			} catch (PDOException $e) {
				exit();
			}
		}
		
		public function escape($value): string {
			return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5);
		}
	}
