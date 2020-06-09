<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>SIGN UP</title>
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

		<h1> Relational-Datingbase</h1>
		
		<form id="signupform" onsubmit="" action="signup_check.php" method="post">
			<p id="signuptitle"> SIGN UP </p><br>
			<p> All fields are required </p>
			<label>Username</label><br>
		    <input name="username" type="email" placeholder="Email address" ><br>
		    <label>First Name</label><br>
		    <input name="firstname" type="text" placeholder="First name" ><br>
		    <label>Last Name</label><br>
		    <input name="lastname" type="text" placeholder="Last name" ><br>
		    <label>Password</label><br>
		    <input name="password" type="text" placeholder="Password" ><br>
		        <br>
		        <br>

		    <!-- MORE ABOUT YOU -->

		    <h3> MORE ABOUT YOU </h3>
		    <label>Nick name</label><br>
		    <input name="nickname" type="text" placeholder="Nickname" ><br>
		    <label>Age</label><br>
		    <input name="age" type="number" placeholder="Age"  min="0" max="100"><br>
		    <label for="location">Location</label><br>
			<select id="location" name="location" >
				<option value="" disabled selected>Select your option</option>
			    <option value="0">Vancouver</option>
			    <option value="1">Kelowna</option>
			    <option value="2">Calgary</option>
			    <option value="3">Arviat</option>
			    <option value="4">Cornwall</option>
			</select><br>
		    <label>Description</label><br>
		    <textarea name="description" rows="10" cols="70"  placeholder="Tell us a little bit about yourself"></textarea><br>

		    <!-- GENDER AND RELATIONSHIP PREFERENCE -->
		    <label>Gender</label><br>
		    <input type="radio" id="male" name="gender" value="M" checked>
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="F">
			<label for="female">Female</label><br><br>

			<label>Your preferred gender to match</label><br>
		    <input type="radio" id="male" name="preferredgender" value="M" checked>
			<label for="male">Male</label>
			<input type="radio" id="female" name="preferredgender" value="F">
			<label for="female">Female</label><br><br>

			<label for="relationship">What relationship are you looking for?</label><br>
			<select id="relationship" name="relationship" >
				<option value="" disabled selected>Select your option</option>
			    <option value="1">Polyamorous</option>
			    <option value="2">Monogamous</option>
			    <option value="3">Platonic</option>
			    <option value="4">Casual</option>
			    <option value="5">Asexual</option>
			</select><br><br>

			<label>Membership</label><br>
		    <input type="radio" id="free" name="membership" value="free" checked onClick=handleClick(this);>
			<label for="free">Free</label>
			<input type="radio" id="premium" name="membership" value="premium" onClick=handleClick(this);>
			<label for="premium">Premium</label><br><br>

		    <button type="submit" name="signupbutton" value="submit" id="signupbutton"> SIGN UP </button>
		    <br><br>

		</form>
	
	</body>
	<script type="text/javascript">
		function handleClick(membership) {

		    if(membership.value == 'premium'){
		    	document.getElementById("signupbutton").innerHTML = "PROCEED TO PAYMENT";
		    }else{
		    	document.getElementById("signupbutton").innerHTML = "SIGN UP";
		    }
		}
	</script>
</html>

