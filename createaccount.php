<?php
$name = htmlspecialchars($_GET["name"]);
$email = htmlspecialchars($_GET["email"]);
$ac = htmlspecialchars($_GET["ac"]);
$pw = htmlspecialchars($_GET["pw"]);

$servername = "localhost";
$username = "root";
$password = "";
$db = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
mysqli_select_db($conn, $db) or die("Could not select database");

$sql = "SELECT * FROM user where account = '" . $ac . "'";
$result = mysqli_query($conn, $sql);
$result_row = mysqli_num_rows($result);
?>

</<!DOCTYPE html>
<html>
	<head>
		<title> System Message </title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	</head>

	<body>
		<div align="center" class="box">
			<h1><i class="far fa-comment-alt"></i> System Message</h1>
			<hr>
		<br>

		<?php if($result_row==1){?>

			<font size="5" color="white">Account already existed.<font>
			<p>
			<button class="button button1" onclick="location.href = 'register.html'"><i class="fas fa-plus-square"></i> Create New Account</button>
			<button class="button button1" onclick="location.href = 'index.html'"><i class="fas fa-arrow-circle-left"></i> Back to Menu</button>
		<?php }
		else{
			$sql2 = "INSERT INTO `user` (`account`, `password`, `nickname`, `email`) VALUES ('$ac', '$pw', '$name', '$email');";
			mysqli_query($conn, $sql2);
			$sqlRoom = "INSERT INTO `room` (`account`, `questionNo`, `skillA`, `skillB`, `skillC`) VALUES ('".$ac."', '1', '1', '1', '1');";
			mysqli_query($conn, $sqlRoom);

			?>
			<font size="5" color="white">Account created, please Login<font>
			<p>
			<button class="button button1" onclick="location.href = 'login.html'"><i class="fas fa-sign-in-alt"></i> Login</button>
		<?php } ?>

		</div>
	</body>

</html>
