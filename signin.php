<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>SIGN IN</title>
		<link rel="stylesheet" href="styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
		<style type="text/css">
			nav{width: 100vw;margin:0;padding:15px;height:55px;position:fixed;top:0;left: 0;background:#EA6557;color: white;}
			nav p{position: absolute;left:7%;color: #fff;font-size: 14px;font-weight: 600;letter-spacing: 3px;margin-top: 20px;}
		</style>
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
		<div id="signinpage">
			<div id="signincover">
				<br>
				
				<form id="signinform" onsubmit="" action="signin_check.php" method="post">
					<p id="signintitle"> SIGN IN </p><br>
					<label>Email</label><br>
				    <input name="username" type="text" placeholder="Email address">
				    <br>
				    <label>Password</label><br>
				    <input name="password" type="text" placeholder="Password">
				        <br>
				        <br>
				    <button type="submit" name="signinbutton" value="submit" id="signinbutton"> SIGN IN</button>
				    <br><br>
				    <?php
		                if(isset($_GET["msg"]) && $_GET["msg"] == 'error'){
		                    $error = $_SESSION["error"];
		                    echo "<script type='text/javascript'>alert('Wrong Email/Password!');</script>";
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