<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
</head>
<body>
	<header>
		<h3 style="text-align: right;">Welcome <a href="user.php?u="><?php echo $_SESSION['name']; ?></a></h3>
		<h4 style="text-align: right;"><a href="logout.php">Logout?</a></h4>
	</header>
</body>
</html>