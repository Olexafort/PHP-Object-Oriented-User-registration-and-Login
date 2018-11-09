<?php
require_once('connect.php');
session_start();
/**
* 
*/
class Classes extends Connect
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function security($var)
	{
		htmlspecialchars($var);
		return $var;
	}

	public function add_user($username, $email, $password)
	{
		$check = "SELECT * FROM user_db WHERE email = :email";
		$prep = $this->pdo->prepare($check);
		$ar = array(":email" => $email);
		$prep->execute($ar);

		$rows = $prep->rowCount();

		if ($rows > 0) {

			$error = "Email already registered";
		}else{
			$stmt = "INSERT INTO user_db (username, email, password) VALUES (:username, :email, :password)";
			$array = array(":username" => $username,
	                   ":email" => $email,
	                   ":password" => md5($password));

			try {
				$query = $this->pdo->prepare($stmt);
				$query->execute($array);

				header("Location: login.php");
			} catch (Exception $e) {
				echo "Error" . $e->getMessage();
			}
		}
		
	}

	public function user_login($email, $password)
	{
		$check = "SELECT * FROM user_db WHERE email = :email";
		$prep = $this->pdo->prepare($check);
		$ar = array(":email" => $email);
		$prep->execute($ar);

		$rows = $prep->rowCount();

		if ($rows > 0) {
			while ($row = $prep->fetch(PDO::FETCH_ASSOC)) {
				if (md5($password) == $row['password']) {
					$_SESSION['id'] = $row['ID'];
					$_SESSION['mail'] = $row['email'];
					$_SESSION['name'] = $row['username'];

					$msg = "Welcome " . $_SESSION['name'];
					header("Location: dashboard.php?msg=" . $msg);

				}
			}
			
		}else{
			$error = "Account does not exists";
			header("Location: index.php?error=" . $error);
		}
	}

	public function logout()
	{
		session_destroy('id');
		session_destroy('name');
		session_destroy('mail');

		header("Location: login.php");
	}
}

?>