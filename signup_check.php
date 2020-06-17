<?php

include 'connect.php';
$email = $_POST['email'];
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$password= $_POST['password'];

$nickname = $_POST['nickname'];
$age= $_POST['age'];
$location= $_POST['location'];
$profilephoto = $_POST['profilephoto'];
$description = $_POST['description'];
$description = str_replace("'", "\'", $description);

$gender= $_POST['gender'];
$preferredgender = $_POST['preferredgender'];
$relationship= $_POST['relationship'];
$membership= $_POST['membership'];

date_default_timezone_set("America/Vancouver");
$currenttime = date("Y-m-d h:i:s");

$conn = OpenCon();

echo $email."<br>".$firstname."<br>".$lastname."<br>".$password."<br>".$nickname."<br>".$age."<br>".$description."<br>".$gender."<br>".$preferredgender."<br>".$relationship."<br>".$profilephoto."<br>".$membership."<br>".$currenttime."<br>";

$sql = "INSERT INTO users (email, firstName, lastName, nickName, description, age, location, password, gender, prefersGender, relationship) VALUES ('$email', '$firstname', '$lastname', '$nickname', '$description', $age, '$location', '$password',  '$gender', '$preferredgender', '$relationship')";


if ($conn->query($sql) === TRUE) {

	$sqlphoto = "INSERT INTO photos (`dateTime`, `userEmail`, `link`) VALUES ('$currenttime', '$email', '$profilephoto')";

	if ($conn->query($sqlphoto) === TRUE) {

		$getphotoid = "SELECT pID FROM photos WHERE userEmail = '$email'";
		$photoresult = $conn->query($getphotoid);
		echo $getphotoid;
		if ($photoresult->num_rows > 0) {
		$photorow = $photoresult->fetch_assoc();
		$photoid = $photorow["pID"];
		$insertphotoid = "UPDATE users SET profile_pic = '$photoid' WHERE email = '$email'";
			echo $photoid;
			if ($conn->query($insertphotoid) === TRUE) {
				echo "inserted";
				if ($membership == 'free'){
					header("Location: signup_success.php");
				}
				else{
					header("Location: creditcard.php");
				}
			}else{
				echo "Error: " . $insertphotoid . "<br>" . $conn->error;
			}		
		}else{
			echo "0 results for photo ID";
		}
	}
	else{
		echo "Error: " . $sqlphoto . "<br>" . $conn->error;
	}
} 
else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
}

CloseCon($conn);
?>
