<!-- this will be the home page -->

<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>
	body{
    		background-color: #D8BFD8;
    		font-family: Roboto;
    		width: 600px;
	}
	a{
		color: #9932CC;
		font-size: 25px;
	}
	p{
		font-size: 50px;
		width: 500px;
	}
	}
</style>
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is the home page.</p>
<!-- <p><a href="dashboard.php">Dashboard</a></p> -->
<a href="logout.php">Logout</a>
</div>
</body>
</html>