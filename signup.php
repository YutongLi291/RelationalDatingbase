<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>SIGN IN</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

		<?php
			include 'connect.php';
			$conn = OpenCon();
			$sql = "SELECT * from users";
			$result = $conn->query($sql);
		?>

		<h1> THIS IS SIGN UP PAGE </h1>
		
	</body>
</html>