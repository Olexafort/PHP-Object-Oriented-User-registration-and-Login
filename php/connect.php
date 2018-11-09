<?php

class Connect
{
	public $pdo = null;
	
	function __construct()
	{
		if (!isset($pdo)) {
			try {
				$this->pdo = new PDO('mysql:host=localhost; dbname=karis_db; ', 'root', '');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				//$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY);

			} catch (PDOException $e) {
				
				echo $e->getMessage();	
			}

			return $this->pdo;
		}
	}

	function __destruct()
	{
		$this->pdo = null;
	}
}

?>