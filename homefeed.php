<<<<<<< yutong


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Relational Datingbase</title>
	<link rel="stylesheet" href = "styles.css">
</head>
<body>
<h1>Your Feed</h1>	


	
</body>
</html>
<?php
	include 'connect.php';
	
	/// NEED TO KNOW WHO IS LOGGED IN
	
	
	if (!isset($_SESSION['userEmail'])) {
		session_start();
		setCurrUser("bbbb@hotmail.com");
	} 
	if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
	
	echo "You are logged in as ".$_SESSION['userEmail']."";
	
	load_feed();
?>
<?php
	
	function setCurrUser($currUser) {
		$_SESSION['userEmail'] = $currUser;
	}
	
	function load_feed() {
		
		$conn = OpenCon();
		$currUser = $_SESSION['userEmail'];
		
		// get name of matched users
		
		
		$sql = "SELECT * from textposts,users where userEmail IN (SELECT secondUser as matches FROM usermatchescontains 
		WHERE firstUser = '$currUser'
		UNION SELECT firstUser FROM usermatchescontains 
		WHERE secondUser = '$currUser'
		UNION  SELECT '$currUser')
		AND users.email = textposts.userEmail order by dateTime DESC";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th class='border-class'>Post Feed</th></tr>
			<tr><th class='border-class'>User</th>
			<th class='border-class'>User Email</th>
			<th class='border-class'>Time Posted</th>
			<th class='border-class'>Content</th>
			<th class='border-class'>Mood</th>
			</tr>"; // output data of each row
			while($row = 
			$result->fetch_assoc()) { 
				if ($row["userEmail"] == $currUser) {
					$sender = "You";
					} else {
					$sender = $row["firstName"]. " ". $row["lastName"] ;
				}
				echo "<tr><td class='border-class'>".$sender. "		"."</td>
				<td class='border-class'>".$row[userEmail]."		"."</td>
				<td class='border-class'>".$row["dateTime"]."		"."</td><td 
				class='border-class'>".$row["content"]."		"."</td><td 
				class='border-class'>".$row["textMood"]."</td></tr>";
			}
			echo "</table>";
		} else {echo "\n No posts yet... say hi :)";}
		CloseCon($conn);
	}
	
	
	
	
	
?>


<form method="POST" onAction="display_chat.php">
    Type Here: <input type="text" name="text" size="100" placeholder="Type status here">
	Mood: <input type="text" name="mood" size="20" placeholder="Happy">
    <input type="submit" name="send" onClick>
</form>



