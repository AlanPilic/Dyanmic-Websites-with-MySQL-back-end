<?php

session_start();

$dbname = 'your_dataBaseName';
$dbuser = 'your_username';
$dbpass = 'yourpassword';
$dbhost = 'localhost';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
$selectedDatabase =  mysql_select_db($dbname) or die("Could not select database");


	   // once a post has been made go ahead and process the data
     if($_POST){
      
	
          $loginName = $_POST['login'];
          $passWord = $_POST['pass'];
          

          // query the table Users and find where the login matches the password
          $query = mysql_query("SELECT * FROM Users WHERE login='$loginName' AND password='$passWord'");

          // if the query executes true, go ahead and create a session with the correct values to be carried over to another page
          if(mysql_num_rows($query) > 0){

          	$_SESSION['_login'] = $loginName;
          	$_SESSION['_password'] = $passWord;

            mysql_close($connect);
          
            header('Location: http://yourwebpage.com/insertData.php');    
      
            exit();

          }

    			
	   }

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<br>
<br>

<div class="container">
  <form action="login.php" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Login :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="login" id="loginInfo" placeholder="Enter your login here">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Password :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="pass" id="passInfo" placeholder="Enter your password here">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
</div>


    </body>
</html> 