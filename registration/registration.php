<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css"/>
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
input[type='text'], input[type='email'],
input[type='password'] {
 		width: 300px;
 		border-radius: 2px;
 		border: 1px solid #CCC;
 		padding: 10px;
 		color: #333;
 		font-size: 14px;
 		margin-top: 10px;
 		display: inline-block;
}

.form{

	width: 300px;
    margin: 0 auto;
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
h3{
	font-size: 35px;
	width: auto;
}
p{
	font-size: 20px;
	width: auto;
}


</style>
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
	$firstname = mysqli_real_escape_string($con,$firstname);
        $lastname = stripslashes($_REQUEST['lastname']);
	$lastname = mysqli_real_escape_string($con,$lastname);
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into users (firstname, lastname, username, password, email, trn_date)
VALUES ('$firstname', '$lastname', '$username', '".($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>YOU ARE NOW REGISTERED</h3>
<br/><p>Click here to <a href='login.php'>Login</a></p></div>";
        }
    }else{
?>
<div class="form">
<h1>REGISTRATION FORM</h1>
<form name="registration" action="" method="post">
<input type="text" name="firstname" placeholder="Firstname" required />
<input type="text" name="lastname" placeholder="Lastname" required />
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
<input type="text" name="captcha_code" id="captcha_code" placeholder="Enter code" /><br><br>
<img src="image.php" id="captcha_image" />
<p><a href='login.php'>Back to Login Page</a></p>
</form>
</div>
<?php } ?>
</body>
</html>