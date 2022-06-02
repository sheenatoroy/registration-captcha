<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>
	body{
    		background-color: #D8BFD8;
    		font-family: Roboto;
	}
	h1{
		width: 500px;
	}

    .form{

    width: 300px;
    margin: 0 auto;
}
	input[type='text'], input[type='email'],
	input[type='password'] {
     		width: 300px;
     		border-radius: 2px;
     		border: 1px solid #CCC;
     		padding: 10px;
     		color: #333;
     		font-size: 14px;
     		margin-top: 10px;
	}
	input[type='submit']{
   	  	padding: 10px 25px 8px;
     		color: #fff;
     		background-color: #DDA0DD;
     		text-shadow: rgba(0,0,0,0.24) 0 1px 0;
     		font-size: 16px;
     		box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     		border: 1px solid #BA55D3;
     		border-radius: 2px;
     		margin-top: 10px;
     		cursor:pointer;
	}
	input[type='submit']:hover {
     		background-color: #9932CC;
	}
	a{
		color: #9932CC;
	}
</style>
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='"($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>LOG IN PAGE</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>