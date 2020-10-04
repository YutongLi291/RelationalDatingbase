<?php
session_start();
if(isset($_SESSION['userEmail'])){
	
}else{
	header("location: signin.php");
}


include 'connect.php';
include 'header.php';
$email = $_SESSION['userEmail'];

$conn = OpenCon();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>PROFILE</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

		<form id="deactivateform" method="post" action="profiledeletecheck.php">
			<h1> Are you sure? </h1><br><br>
			<label>Please enter your password to proceed</label><br><br>
		    <input name="deactivatepassword" type="text" placeholder="Your password" required><br><br><br>
		    <button type="submit" name="deactivatebutton" class="deactivatebutton"> Deactivate </button>
		</form>
	</body>
</html>
