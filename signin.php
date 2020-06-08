<?php
session_start();
?>

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

		// if ($result->num_rows > 0) {
		// 	echo "<table>
		// 	<tr>
		// 	<th class='border-class'>First Name</th>
		// 	<th class='border-class'>Password</th>
		// 	</tr>";// output data of each row

		// 	while($row = 
		// 	$result->fetch_assoc()) { 
		// 		echo "<tr><td class='border-class'>".$row["firstName"]."</td>
		// 		<td class='border-class'>".$row["password"]."</td></tr>";}echo "</table>";} else {echo "0 results";
		// 	}

		// 	CloseCon($conn);
		?>

		<div id="signinpage">
			<div id="signincover">
				<br>
				<h1> Relational-Datingbase</h1>
				
				<form id="signinform" onsubmit="" action="signin_check.php" method="post">
					<p id="signintitle"> SIGN IN </p><br>
					<label>Username</label><br>
				    <input name="username" type="text" placeholder="Email address">
				    <br>
				    <label>Password</label><br>
				    <input name="password" type="text" placeholder="Password">
				        <br>
				        <br>
				    <button type="submit" name="signinbutton" value="submit" id="signinbutton"> SIGN IN</button>
				    <br><br>
				    <?php
		                if(isset($_SESSION["error"])){
		                    $error = $_SESSION["error"];
		                    echo "<span>$error</span>";
		                }
		            ?>  
		            <br><br><br>
		            <p> Don't have an account yet? <a href="signup.php" id="signinsignup">SIGN UP</a></p>
				</form>
			<div>
		</div>
	</body>
</html>

<?php
    unset($_SESSION["error"]);
?>