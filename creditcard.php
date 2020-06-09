<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>PAGE TITLE</title>
		<link rel="stylesheet" href="styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

		<?php
			include 'connect.php';
			$conn = OpenCon();
			$sql = "SELECT * from users";
			$result = $conn->query($sql);
		?>

		<h1> CREDIT CARD </h1>
		<form id="signupform" onsubmit="" action="creditcard_check.php" method="post">
			<p id="signuptitle"> SIGN UP </p><br>
			<p> All fields are required </p>
		    <label>Credit card number</label><br>
		    <input name="pan" type="text" placeholder="Credit card number" required><br>

		    <label>Cardholder name</label><br>
		    <input name="cardholder" type="text" placeholder="Cardholder name" required><br>

		    <label>Expiration date</label><br>
		    <input name="expirationdate" type="date" placeholder="Expiry date" required><br>

		    <label for="company"> Credit card company</label><br>
			<select id="company" name="company" required>
				<option value="" disabled selected>Select your option</option>
			    <option value="0">Visa</option>
			    <option value="1">Mastercard</option>
			    <option value="2">American Express</option>
			    <option value="3">Capital One</option>
			    <option value="4">Chase</option>
			</select><br>
		   	<label>Username</label><br>
		    <input name="useremail" type="email" placeholder="Email address" require ><br>

		    <button type="submit" name="signupbutton" value="submit" id="signupbutton"> SIGN UP</button>
		    <br><br>
	</body>
</html>