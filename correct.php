<?php
  $ac = htmlspecialchars($_GET["ac"]);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "project";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
  mysqli_select_db($conn, $db) or die("Could not select database");

  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $sql = "SELECT * FROM user where account = '" . $ac . "' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $roompage = "room.php?ac=" . $ac."&S=0";
  $mainpage = "main.php?ac=" . $ac;
?>

</<!DOCTYPE html>
<html>
  <head>
    <title>Correct or Not</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>

  <body>
    <?php echo "AC: " . $ac; ?>
    <div align="center" class="box">
      <h1>Congratulations! <font color="green" > You are correct!!! </font>
      </h1>
      <hr>
      <font size="4" color="white">
      Name:
      <?php
        echo $row["nickname"];
       ?>
      <p>
      Total Reward: <?php
        echo "$ " . $row["totalReward"];
      ?>
      <font>
      <p>
      <button type="button" class="button button1" onclick="location.href = '<?php echo $roompage ?>' "><i class="fas fa-play"></i> Next Question</button>
    </div>
  </body>
</html>
