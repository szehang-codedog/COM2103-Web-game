<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "project";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
  mysqli_select_db($conn, $db) or die("Could not select database");
  
  mysqli_query($conn,"SET CHARACTER SET UTF8");
  
  //$sql = "SELECT * FROM question";
  //$result = mysqli_query($conn, $sql);
?>

<html>

  <head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>

<body>
	<div align="center" class="box">
    <h1>Admin Page</h1>
    <hr>
    <?php
		//while($row = mysqli_fetch_array($result)) {
		//	echo $row['questionNo']; // Print a single column data
		//	echo $row['question'];
		//	echo '<br>';
		//}
		
		/////
		  
		  
		  $sql1 = "SELECT * FROM question ORDER BY questionNo";
		  $result1 = mysqli_query($conn, $sql1);
		  $row1 = mysqli_fetch_array($result1);
		  $rowNum1 = mysqli_num_rows($result1);
		  
		  if($rowNum1 == 0) {
			  echo "no question";
		  }else {
			  $no = 1;
	?>
			<table bgcolor="#999999" width="1000" border="1">
				<tr>
					<th>Question No.</th>
					<th>Question</th>
					<th>Answer</th>
					<th>A</th>
					<th>B</th>
					<th>C</th>
					<th>D</th>
					<th>Bonus</th>
				</tr>
				<?php
					for($no = 1; $no <= $rowNum1; $no++) {
						$sqlQ = "SELECT * FROM question WHERE questionNo = '".$no."'";
						$resultQ = mysqli_query($conn, $sqlQ);
						$rowQ = mysqli_fetch_array($resultQ);
						$QNo = $rowQ["questionNo"];
						$Q = $rowQ["question"];
						$anw = $rowQ["answer"];
						$A = $rowQ["choiceA"];
						$B = $rowQ["choiceB"];
						$C = $rowQ["choiceC"];
						$D = $rowQ["choiceD"];
						$bonus = $rowQ["bonus"];
						
						
						echo "<tr>";
							echo "<td>$QNo</td>";
							//echo "<td><input type='textarea' value='$Q' style='width:100%';></input></td>";			
							echo "<td>$Q</td>";
							echo "<td>$anw</td>";
							echo "<td>$A</td>";
							echo "<td>$B</td>";
							echo "<td>$C</td>";
							echo "<td>$D</td>";
							echo "<td>$bonus</td>";
						echo "</tr>";
					}
				?>
			</table>			  
	<?php } ?>
    <p>
      

      <button class="button button1" onclick="location.href = 'index.html'"><i class="fas fa-sign-out-alt"></i> Logout</button>

    </div>
  </body>

</html>
