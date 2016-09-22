<?php

$dbname = 'your_dataBaseName';
$dbuser = 'your_username';
$dbpass = 'yourpassword';
$dbhost = 'localhost';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
$selectedDatabase =  mysql_select_db($dbname) or die("Could not select database");

    // creates a login and a password based on what you enter and assigns a unique auto incrementing id to the login
    if ( $_POST ) {
    	
    $loginName = $_POST['login'];
    $passWord = $_POST['pass'];


      mysql_query("INSERT INTO Users (`ID`, `login`, `password`, `friends`, `status`, `linked`, `intro`, `describeInfo`)
       VALUES (NULL, '$loginName', '$passWord', '', '', '', '', '');") or die("Could not insert into database");
			

			mysql_close($connect);
			
			header('Location: http://yourwebpage.com/login.php');		
	    
            exit();
   
    }
	
	
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to the account registration website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<br>
<br>

<div class="container">
  <form action="createaLogin.php" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Login :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="login" id="loginInfo" placeholder="Enter your login here">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Password :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="pass" id="passInfo" placeholder="Ze pass goes here">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
  </form>
</div>


    </body>
</html> 
