<?php
session_start();
if(isset($_SESSION['userEmail'])){
	
}else{
	header("location: signin.php");
}
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

		<?php
			include 'connect.php';
			include 'header.php';
            $email = $_POST['matchEmail'];
            // echo "<p>{$email}</p>";

			$conn = OpenCon();
			$sql = "SELECT * FROM users WHERE email ='$email'";
			$result = $conn->query($sql);


			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					$firstname= $row["firstName"];
					$lastname= $row["lastName"];
					$nickname= $row["nickName"];
					$email= $row["email"];
					$description= $row["description"];
					$age= $row["age"];
					$location= $row["location"];
					$gender= $row["gender"];
					$prefersgender= $row["prefersGender"];
					$relationship= $row["relationship"];
					$profilepic= $row["profile_pic"];
			}
			else {
				echo "0 results for users";
			}
			// echo $description;

			echo "<div id='profilecover'>";
				echo "<div class='maxwidth profiletop'>";
					$sqlphoto = "SELECT * FROM photos WHERE pID ='". $profilepic ."'";
					$profilephoto = $conn->query($sqlphoto);

					$sqllocation= "SELECT * FROM location WHERE locID ='". $location ."'";
					$profilelocation = $conn->query($sqllocation);

					$sqlrelationship= "SELECT * FROM relationships WHERE rID ='". $relationship ."'";
					$profilerelationship = $conn->query($sqlrelationship);

					if ($profilephoto->num_rows > 0) {
						for($i=0; $i<1; $i++){
							$photo = $profilephoto->fetch_assoc();

							// PROFILE PHOTO ON TOP COLUMN
							echo "<div class='profileleft'>";
								echo "<div id='profilephoto'><img src='".$photo["link"]."'/></div>";
							echo "</div>";
						}
					}
					else {
						echo "0 results for photo";
					}
					echo "<div class='profileright'>";
						echo "<br><br><h2>".$firstname." ".$lastname."</h2>";
						echo "<p>You can call me <span style='margin-left:10px;'>".$nickname."</span></p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "<div id='profileinfo'>";
				echo "<div class='maxwidth profilebottom'>";
				echo "<p><span class='profiletextvalue'> Age </span><span class='profiletextbold'>".$age."</span></p>";
				if ($profilelocation->num_rows > 0) {
					$exactlocation = $profilelocation->fetch_assoc();
					echo "<p><span class='profiletextvalue'> Location </span><span class='profiletextbold'>".$exactlocation["city"].", ".$exactlocation["province"]."</span></p>";
				}
				else {
					echo "0 results for location";
				}
				
				echo "<p><span class='profiletextvalue'> Preferred gender </span><span class='profiletextbold'>".$gender."</span></p>";

				if ($profilerelationship->num_rows > 0) {
					$therelationship = $profilerelationship->fetch_assoc();
					echo "<p><span class='profiletextvalue'> Preferred relationship </span><span class='profiletextbold'>".$therelationship["description"]."</span></p>";
				}
				else {
					echo "0 results for location";
				}
				
				echo "<p><span class='profiletextvalue'> A little bit about myself:</p><p class='profiletextvalue'><i style='font-size:14px;'>\"".$description."\"</i></span></p>";
				echo "</div>";
			echo "</div>";
        ?>
        

        <form id="filter_form" action="display_chat.php" method="post" class="center">
            <?php 
            ?>
        <input type="submit" name="openChatButton" value="Message This Human?" class="messagethishuman">
        <input type="hidden" name="matchEmail" value=<?php echo $_POST['matchEmail']?>>
        </form>

            
	</body>
</html>