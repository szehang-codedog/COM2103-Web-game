<?php
  $ac = htmlspecialchars($_GET["ac"]);
  $S = htmlspecialchars($_GET["S"]);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "project";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password) or die("Connection failed");
  mysqli_select_db($conn, $db) or die("Could not select database");

  mysqli_query($conn,"SET CHARACTER SET UTF8");
  $sql1 = "SELECT * FROM user where account = '" . $ac . "' ";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);
  
  //sql for play record
  $sqlR = "SELECT * FROM room WHERE account = '".$ac."'"; 
  $resultR = mysqli_query($conn, $sqlR);
  $rowR = mysqli_fetch_array($resultR);
  $rowNumR = mysqli_num_rows($resultR);
  if ($rowNumR == 0) {
	$sqlAddR = "INSERT INTO `room` (`account`, `questionNo`, `skillA`, `skillB`, `skillC`) VALUES ('".$ac."', '1', '1', '1', '1')";
    mysqli_query($conn, $sqlAddR);
	header('Location: room.php?ac='.$ac);
  }	
  if ($rowNumR == 1) {
    $CQ = $rowR["questionNo"]; //currentQuestion
	$SA = $rowR["skillA"]; //SkillA
	$SB = $rowR["skillB"]; //SkillB
	$SC = $rowR["skillC"]; //SkillC
  }
  
  //sql for question
  $sqlQ = "SELECT * FROM question WHERE questionNo = '".$CQ."'"; 
  $resultQ = mysqli_query($conn, $sqlQ);
  $rowQ = mysqli_fetch_array($resultQ);
  $rowNumQ = mysqli_num_rows($resultQ);
  if ($rowNumQ == 0) {
	$noQuestion = 1;
  }
  if ($rowNumQ == 1) {
	$noQuestion = 0;
	$question = $rowQ["question"];
	$bonus = $rowQ["bonus"];
  }
  echo "CQ: ".$CQ."    rowNumQ: ".$rowNumQ;
  

  $roompage = "room.php?ac=" . $ac;
  $mainpage = "main.php?ac=" . $ac;
?>

</<!DOCTYPE html>
<html>
  <head>
    <title>Room</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>

  <body>
    <?php echo "AC: " . $ac; ?>
	
	<?php if($noQuestion == 1) { ?>
	  <div align="center" class="box">
	  <h2>Stage: 10 |
      Reward: <?php echo $row1['totalReward'] ?></h2>
      <hr>
      <h1>You are Chan Kai Tai Now!!!</h1>
	  <h1>ATV Love You</h1>
	  <div class="crop">
		<img alt="I am ATV" src="https://upload.wikimedia.org/wikipedia/zh/0/0b/ATV_2016_2d.png">
	  </div>
	  
	  <h2>More question after update</h2>

      <hr></hr>

      <button class="button button1" onclick="location.href = 'main.php?ac=<?php echo $ac ?>'"><i class="fas fa-backspace"></i> Back</button>
	  </div>
	<?php }else{ ?>
	  <div align="center" class="box">
	  <h2>Stage: <?php echo $CQ ?> |
      Reward: $ <?php echo $bonus ?></h2>
      <hr>
      <h1> <?php echo $question ?> </h1>

      <hr></hr>

      <form method="POST">
        <button class="button button1" name="A">A.
        <?php
          echo $rowQ["choiceA"];
        ?>
        </button>

        <button class="button button1" name="B">B.
          <?php
            echo $rowQ["choiceB"];
          ?>
        </button>

        <p>

        <button class="button button1" name="C">C.
          <?php
            echo $rowQ["choiceC"];
          ?>
        </button>


        <button class="button button1" name="D">D.
          <?php
            echo $rowQ["choiceD"];
          ?>
        </button>
        

       <!--A-->
        <?php
          if(isset($_POST["A"])){
            $sql_ans = "SELECT answer from question where answer='A' and questionNo='" . $CQ . "' ";
            $answer = mysqli_query($conn, $sql_ans);
            $answer_row = mysqli_num_rows($answer);
          if($answer_row==1){
            $addreward_sql = "UPDATE user SET totalReward = totalReward + '".$bonus."' where account='" . $ac . "' ";
            $addreward_result = mysqli_query($conn, $addreward_sql);

            $addstage_sql = "UPDATE room SET questionNo = 1 + '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: correct.php?ac='.$ac);

          }else{
            //$addreward_sql = "UPDATE user SET totalReward = 0 where account='" . $ac . "' ";
            //$addreward_result = mysqli_query($conn, $addreward_sql);
           

            $addstage_sql = "UPDATE room SET questionNo = '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: incorrect.php?ac='.$ac);
          }
        }
    ?>

          <!--B-->
        <?php
          if(isset($_POST["B"])){
            $sql_ans = "SELECT answer from question where answer='B' and questionNo='" . $CQ . "' ";
            $answer = mysqli_query($conn, $sql_ans);
            $answer_row = mysqli_num_rows($answer);
          if($answer_row==1){
            $addreward_sql = "UPDATE user SET totalReward = totalReward + '".$bonus."' where account='" . $ac . "' ";
            $addreward_result = mysqli_query($conn, $addreward_sql);

            $addstage_sql = "UPDATE room SET questionNo = 1 + '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: correct.php?ac='.$ac);

          }else{
            //$addreward_sql = "UPDATE user SET totalReward = 0 where account='" . $ac . "' ";
            //$addreward_result = mysqli_query($conn, $addreward_sql);
           

            $addstage_sql = "UPDATE room SET questionNo = '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: incorrect.php?ac='.$ac);
          }
        }
    ?>


          <!--C-->
        <?php
          if(isset($_POST["C"])){
            $sql_ans = "SELECT answer from question where answer='C' and questionNo='" . $CQ . "' ";
            $answer = mysqli_query($conn, $sql_ans);
            $answer_row = mysqli_num_rows($answer);
          if($answer_row==1){
            $addreward_sql = "UPDATE user SET totalReward = totalReward + '".$bonus."' where account='" . $ac . "' ";
            $addreward_result = mysqli_query($conn, $addreward_sql);

            $addstage_sql = "UPDATE room SET questionNo = 1 + '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: correct.php?ac='.$ac);

          }else{
            //$addreward_sql = "UPDATE user SET totalReward = 0 where account='" . $ac . "' ";
            //$addreward_result = mysqli_query($conn, $addreward_sql);
           

            $addstage_sql = "UPDATE room SET questionNo = '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: incorrect.php?ac='.$ac);
          }
        }
    ?>

            <!--D-->
        <?php
          if(isset($_POST["D"])){
            $sql_ans = "SELECT answer from question where answer='D' and questionNo='" . $CQ . "' ";
            $answer = mysqli_query($conn, $sql_ans);
            $answer_row = mysqli_num_rows($answer);
          if($answer_row==1){
            $addreward_sql = "UPDATE user SET totalReward = totalReward + '".$bonus."' where account='" . $ac . "' ";
            $addreward_result = mysqli_query($conn, $addreward_sql);

            $addstage_sql = "UPDATE room SET questionNo = 1 + '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: correct.php?ac='.$ac);

          }else{
            //$addreward_sql = "UPDATE user SET totalReward = 0 where account='" . $ac . "' ";
            //$addreward_result = mysqli_query($conn, $addreward_sql);
           

            $addstage_sql = "UPDATE room SET questionNo = '".$CQ."' where account='" . $ac . "' ";
            $addstage_result = mysqli_query($conn, $addstage_sql);

            header('Location: incorrect.php?ac='.$ac);
          }
        }
    ?>

    </form>

      <hr></hr>
	  <form method="POST">
	  <?php
		if ($SA == 1) {
			echo '<button class="button button1" name="SA">50:50</button>';
			if(isset($_POST["SA"])){
				$sql_S = "UPDATE room SET skillA = 0 WHERE account = '".$ac."' ";
				$Squery = mysqli_query($conn, $sql_S);
				$S=1;
				header('Location: room.php?ac='.$ac.'&S='.$S);
			}
		} else {
			echo '<button class="button button1" style="text-decoration: line-through;">50:50</button>';
		}
		
		if ($SB == 1) {
			echo '<button class="button button1" name="SB">My Best Teacher</button>';
			if(isset($_POST["SB"])){
				$sql_S = "UPDATE room SET skillB = 0 WHERE account = '".$ac."' ";
				$Squery = mysqli_query($conn, $sql_S);
				$S=2;
				header('Location: room.php?ac='.$ac.'&S='.$S);
			}
		} else {
			echo '<button class="button button1" style="text-decoration: line-through;">My Best Teacher</button>';
		}
		
		if ($SC == 1) {
			echo '<button class="button button1" name="SC">???</button>';
			if(isset($_POST["SC"])){
				$sql_S = "UPDATE room SET skillC = 0 WHERE account = '".$ac."' ";
				$Squery = mysqli_query($conn, $sql_S);
				$S=3;
				header('Location: room.php?ac='.$ac.'&S='.$S);
			}
		} else {
			echo '<button class="button button1" style="text-decoration: line-through;">???</button>';
		}
	  ?>
      <!--
	  <button class="button button1">50:50</button>
      <button class="button button1"></button>
      <button class="button button1">???</button>
	  -->
	  </form>
	  
	  <hr/>
	  
	  <?php
		if ($S==1){
			//display 50:50
			$corrAns = $rowQ['answer'];
			$CA = $corrAns;
			$incorrAns = "SELECT answer from question where answer != '".$corrAns."' Limit 1 ";
            $incorranswer = mysqli_query($conn, $incorrAns);
			$ICArow = mysqli_fetch_array($incorranswer);
			$ICA = $ICArow['answer'];
			echo "<h2>一係$ICA ，一係$CA ，除非唔係 。</h2>";
		}
		if ($S==2){
			//display google
			?>
			<button type="button" class="button button1" onclick="window.open('https://www.google.com/')" value="open window">Ask me la</button>
			<?php
		}
		if ($S==3){
			//display LIHKG https://lihkg.com/category/1
			?>
			<button type="button" class="button button1" onclick="window.open('https://lihkg.com/category/1')" value="open window"><b>???</b></button>
			<?php
		}
	  ?>
	  
	  
    </div>
	<?php } ?>
	
    

  </body>
</html>
