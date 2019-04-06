<?php
	$ac = htmlspecialchars($_GET["ac"]);
	$pw = htmlspecialchars($_GET["pw"]);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "project";

	$mainpage = "main.php?ac=" . $ac;
	$adminpage = "admin.php";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
	mysqli_select_db($conn, $db) or die("Could not select database");

	$sql = "SELECT * FROM user where account = '" . $ac . "' and password = '" . $pw . "'";
	$result = mysqli_query($conn, $sql);
	$result_row = mysqli_num_rows($result);

	$sq2 = "SELECT * FROM user where account = '" . $ac . "' and password = '" . $pw . "' and admin = '1'";
	$result_admin = mysqli_query($conn, $sq2);
	$result_row_admin = mysqli_num_rows($result_admin);
?>

</<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<title> System Message </title>
	</head>

	<body>
		<div align="center" class="box">
		<h1><i class="far fa-comment-alt"></i> System Message</h1>
		<hr>
		<br>
		<?php
		if ($result_row==1 and $result_row_admin==1){
			mysqli_free_result($result);
			header('Location: '. $adminpage);
		}if($result_row==1 and $result_row_admin==0){
			mysqli_free_result($result);
			header('Location: '. $mainpage);
		}else{?>
			<font size="5" color="white">Login failed <font>
			<p>
			<button class="button button1" onclick="location.href = 'register.html'"><i class="fas fa-plus-square"></i> Create Account</button>
			<button class="button button1" onclick="location.href = 'index.html'"><i class="fas fa-arrow-circle-left"></i> Back to Menu</button>
			<?php mysqli_free_result($result);
		} ?>
		</div>

	</body>
</html>
