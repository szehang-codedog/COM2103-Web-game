<?php
  $ac = htmlspecialchars($_GET["ac"]);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "project";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
  mysqli_select_db($conn, $db) or die("Could not select database");

  $sql = "SELECT * FROM user where account= '" . $ac . "' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  
  $sqlR = "SELECT * FROM room where account= '" . $ac . "' ";
  $resultR = mysqli_query($conn, $sqlR);
  $rowR = mysqli_fetch_array($resultR);
  
  $sqlQ = "SELECT * FROM question"; 
  $resultQ = mysqli_query($conn, $sqlQ);
  $rowQ = mysqli_fetch_array($resultQ);
  $rowNumQ = mysqli_num_rows($resultQ);
  
  $roompage = "room.php?ac=" . $ac."&S=0";

?>

<html>
  <head>
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>

  <body>
    <?php echo "AC: " . $ac; ?>
    <div align="center" class="box">
      <h1>Home Page</h1>
      <hr>
      <font size="4" color="white">
      Name:
      <?php
        echo $row["nickname"];
       ?>
      <p>
      Current Stage: <?php
		//
		$CS = $rowR["questionNo"]; //currentstage
		if($CS > $rowNumQ) {
			echo $rowNumQ;
		}else {
			echo $rowR["questionNo"];
		}
		//
		
		
        
      ?>
      <p>
      Total Reward: <?php
        echo "$ " . $row["totalReward"];
      ?>

      <font>
      <p>
      <button type="button" class="button button1" onclick="location.href = '<?php echo $roompage ?>' "><i class="fas fa-play"></i> Play</button>
	  <button type="button" class="button button1" onclick="location.href = 'index.html'"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </div>
  </body>

</html>
