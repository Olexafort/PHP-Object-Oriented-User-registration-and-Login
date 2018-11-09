<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	require_once('php/classes.php');

	$person = new Classes();

	$name = $person->security($_POST['username']);
	$email = $person->security($_POST['email']);
	$password = $person->security($_POST['password']);

	if (!empty($email)) {
		$person->add_user($name, $email, $password);
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
	<div>
		<form action="index.php" method="POST">
			<div>
				<input type="text" name="username" placeholder="Enter Username">
			</div>
			<div>
				<input type="email" name="email" placeholder="Enter Email Address">
			</div>
			<div>
				<input type="password" name="password" placeholder="Enter Password">
			</div>
			<div>
				<input type="submit" name="submit" value="Register Now">
			</div>
		</form>
		<div>
			<a href="login.php">Already Registered?</a>
		</div>
	</div>
</body>
</html>