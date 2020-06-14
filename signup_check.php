<?php

include 'connect.php';
$username = $_POST['username'];
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$password= $_POST['password'];

$nickname = $_POST['nickname'];
$age= $_POST['age'];
$location= $_POST['location'];
$profilephoto = $_POST['profile'];
$description = $_POST['description'];

$gender= $_POST['gender'];
$preferredgender = $_POST['preferredgender'];
$relationship= $_POST['relationship'];
$membership= $_POST['membership'];

echo $username."<br>".$firstname."<br>".$lastname."<br>".$password."<br>".$nickname."<br>".$age."<br>".$description."<br>".$gender."<br>".$preferredgender."<br>".$relationship."<br>".$membership;
$conn = OpenCon();

$sql = "INSERT INTO users (email, firstName, lastName, nickName, description, age, location, password, gender, prefersGender, relationship) VALUES('$username', '$firstname', '$lastname', '$nickname', '$description', $age, '$location', '$password',  '$gender', '$preferredgender', '$relationship')";
//$sqlprofilephoto = "INSERT INTO photos "

if ($conn->query($sql) === TRUE) {

	if ($membership == 'free'){
		header("Location: signup_success.php");
	}
	else{
		header("Location: creditcard.php");
	}

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

CloseCon($conn);
?>
