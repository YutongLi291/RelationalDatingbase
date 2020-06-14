<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$error = "Username/password is incorrect";

// if(isset($_POST['signinbutton'])){	THIS IS JUST TO TEST IF YOU ARE GRABBING THE RIGHT USERNAME AND PASSWORD VALUE
// 	echo $username." ".$password;
// }

$query = "SELECT * FROM users WHERE email = '". $username ."' AND password = '". $password ."'" ;
$result = $conn->query($query);

//echo mysqli_num_rows($result); TO TEST THE NUMBER OF ROWS OUTPUTTED

if (mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $username;
	header("Location: browse.php");
} else {
	$_SESSION["error"] = $error;
    header("location: signin.php");
}
?>
