<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>SIGN IN</title>
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
		<nav> 
			<p> RELATIONAL DATINGBASE</p>
		</nav>
		<div class="fullpage">
			<div class="halfleft">
			</div>
			<div class="halfright">
				<br>
				
				<form id="signinform" onsubmit="" action="signin_check.php" method="post">
					<p id="signintitle"> SIGN IN </p><br>
				    <input name="username" type="text" placeholder="Email address">
				    <br>
				    <input name="password" type="text" placeholder="Password">
				        <br>
				        <br>
				    <button type="submit" name="signinbutton" value="submit" id="signinbutton"> SIGN IN</button>
				    <br><br>
				    <?php
		                if(isset($_SESSION["error"])){
		                    $error = $_SESSION["error"];
		                    echo "<p>$error</p>";
		                }
		            ?>  
		            <br><br><br>
		            <p style='text-align: center;'> Don't have an account yet? <a href="signup.php" id="signinsignup">SIGN UP &#8594;</a> </p>
				</form>
			<div>
		</div>
	</body>
</html>

<?php
    unset($_SESSION["error"]);
?>