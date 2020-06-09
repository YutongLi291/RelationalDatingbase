<?php

include 'connect.php';
$username = $_POST['username'];
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$password= $_POST['password'];

$nickname = $_POST['nickname'];
$age= $_POST['age'];
$location= $_POST['location'];
$description = $_POST['description'];

$gender= $_POST['gender'];
$preferredgender = $_POST['preferredgender'];
$relationship= $_POST['relationship'];
$membership= $_POST['membership'];
if ($membership == 'free'){
	header("Location: signup_success.php");
}
else{
	header("Location: creditcard.php");
}
echo $username."<br>".$firstname."<br>".$lastname."<br>".$password."<br>".$nickname."<br>".$age."<br>".$description."<br>".$gender."<br>".$preferredgender."<br>".$relationship."<br>".$membership;
$conn = OpenCon();


// $sql = "INSERT INTO users (email, firstName, lastName, nickName, description, age, location, password, gender, prefersGender, relationship) VALUES('$username', '$firstname', '$lastname', '$nickname', '$description', $age, '$location', '$password',  '$gender', '$preferredgender', '$relationship')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

CloseCon($conn);
?>
