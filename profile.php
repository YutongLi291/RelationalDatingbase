<?php
session_start();
if(isset($_SESSION['username'])){
	
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
			$email = $_SESSION['username'];

			$conn = OpenCon();
			$sql = "SELECT * FROM users WHERE email ='". $email ."'";
			$result = $conn->query($sql);

		?>

		<div id="profilecover">
			<div class="maxwidth">
				<?php
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<br><br><br>";
							echo "<h1>".$row["firstName"]." ".$row["lastName"];
						} 
					}
					else {
						echo "0 results";
					}
				?>
			</div>
		</div>
		
	</body>
</html>