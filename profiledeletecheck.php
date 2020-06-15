<?php
session_start();
if(isset($_SESSION['userEmail'])){
	
}else{
	header("location: signin.php");
}

include 'connect.php';
$email = $_SESSION['userEmail'];

$conn = OpenCon();

$deactivatepassword = $_REQUEST['deactivatepassword'];
echo $deactivatepassword;

$matchpassword = "SELECT password FROM users WHERE email = '".$email."'";
$result = $conn->query($matchpassword);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$password = $row["password"];
	echo $password;

	if($deactivatepassword == $password){
		echo "password match";
		$deactivateaccount = "DELETE FROM users WHERE email = '".$email."'";

		if ($conn->query($deactivateaccount) === TRUE) {
			echo "<br><br>USER DELETED";
			
		}else{
			echo "Error: " . $deactivateaccount . "<br>" . $conn->error;
		}	
	}
}
else{
	echo "0 results";
}

?>

<!-- ALTER TABLE photos
  ADD CONSTRAINT FK_Photos2
  FOREIGN KEY (userEmail) 
  REFERENCES users(email) 
  ON DELETE CASCADE; -->
