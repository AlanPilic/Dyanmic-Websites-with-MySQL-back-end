<?php

session_start();

$dbname = 'your_dataBaseName';
$dbuser = 'your_username';
$dbpass = 'yourpassword';
$dbhost = 'localhost';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
$selectedDatabase =  mysql_select_db($dbname) or die("Could not select database");

$loginName = $_SESSION['_login'];
$passWord = $_SESSION['_password'];

$result = mysql_query("SELECT * FROM Users WHERE login='$loginName' AND password='$passWord'");


if ( $_POST ) {
      
    $intro = $_POST['introduction'];
    $loginName = $_SESSION['_login'];
    $linkedSkills = $_POST['skills'];
    $describeInfoHobbies = $_POST['hobbies'];

    if ($intro == "" || $linkedSkills == "" || $describeInfoHobbies == "") {

    }
    else{
    	mysql_query("UPDATE Users SET intro = '$intro', linked = '$linkedSkills', describeInfo = '$describeInfoHobbies' WHERE login = '$loginName'");
      
      	mysql_close($connect);
    }

      header('Location: http://yourwebpage.com/insertData.php');		
	    
            exit();
      
   
}

?>

<!DOCTYPE html>
<!-- float:left; -->
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  #roundDiv {
    border-radius: 25px;
    border: 2px solid #4169E1;
    padding: 20px;
    width: 400px;
    height: 250px;
    float:left;
  }
  #squareDiv {
    border: 2px solid #808080;
    padding: 20px;
    width: 400px;
    height: 250px;
    float:left;
  }
  #alignLeft {
  	position: absolute;
    left: 20px;
  }
  #horizontalDiv {
    border: 2px solid #808080;
    padding: 20px;
    width: 1190px;
    height: 250px;
  }
  .h1, h1 {
    font-size: 18px;
  }
  </style>

</head>

<body>


      
      <?php while ($row = mysql_fetch_array($result)) { ?>

        <div>
        <h1> Hello there <?php echo $row["login"] ?>! </h1>
        </div>
        <div> The picture you uploaded would go here </div>
        <br><br>
        <div> <? echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['content'] ).'"/>'; ?> </div>

        <button id="uploadPicture">Upload a picture</button>

        <script type="text/javascript">
            document.getElementById("uploadPicture").onclick = function () {
                location.href = "http://yourwebpage.com/uploadPicture.php";
            };
        </script>

        <br><br>

        <div id="inner" style="overflow:hidden;width: 1200px">

        <div id="horizontalDiv">
        <h1> You are : <?php echo $row["intro"] ?> </h1>
        </div>
        <div id="horizontalDiv">
        <h1> Your Skills : <?php echo $row["linked"] ?> </h1>
        </div>
        <div id="horizontalDiv">
        <h1> Your Hobbies :  <?php echo $row["describeInfo"] ?> </h1>
        </div>

        </div>

      <?php } ?>


<br>
<br>

<div id="alignLeft" class="container">

  <form action="insertData.php" method="POST" class="form-horizontal" role="form">

    <div class="form-group">

      <label class="control-label col-sm-2" for="email">Put a Description here : </label>

      <div class="col-sm-30">
        <input type="text" class="form-control" name="introduction" id="introductionInfo" placeholder="Introduce yourself here">
      </div>

      <br>

      <label class="control-label col-sm-2">Describe your skills : </label>

      <div class="col-sm-30">
        <input type="text" class="form-control" name="skills" placeholder="Skills here">
      </div>

      <br>

      <label class="control-label col-sm-2">Describe your hobbies : </label>

      <div class="col-sm-30">
        <input type="text" class="form-control" name="hobbies" placeholder="Hobbies here">
      </div>

    </div>

    <br>
    
    <div class="form-group">  

      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Post your intro</button>
      </div>

    </div>

  </form>

</div>






</body>
</html>