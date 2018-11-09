<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	require_once('php/classes.php');

	$person = new Classes();

	$email = $person->security($_POST['email']);
	$password = $person->security($_POST['password']);

	if (!empty($email)) {
		$person->user_login($email, $password);
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
	<div>
		<form action="login.php" method="POST">
			<div>
				<input type="email" name="email" placeholder="Enter Email Address">
			</div>
			<div>
				<input type="password" name="password" placeholder="Enter Password">
			</div>
			<div>
				<input type="submit" name="submit" value="Login">
			</div>
		</form>
		<div>
			<a href="index.php">Create Account?</a>
		</div>
	</div>
	</center>
</body>
</html>