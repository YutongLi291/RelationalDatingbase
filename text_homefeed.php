

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home Feed</title>
		<link rel="stylesheet" href = "styles.css">
	</head>
	<body>
		<h1>Your Text Feed</h1>
		
		
		
	</body>
</html>
<?php
	include 'connect.php';
	include "save_post.php";
	/// NEED TO KNOW WHO IS LOGGED IN
	
	
	if (!isset($_SESSION['userEmail'])) {
		session_start();
		setCurrUser("bbbb@hotmail.com");
	}
	if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
	if (isset($_POST['text'])) {
        post();
        unset($_POST['text']);
	}
	$currUser = $_SESSION['userEmail'];
	$sql0 = "SELECT firstName, lastName from users WHERE email = '$currUser'";
	$conn0 = OpenCon();
	$result = $conn0->query($sql0);
	$row = $result->fetch_assoc();
	echo "You are logged in as ".$row["firstName"]." ".$row["lastName"]." (".$_SESSION['userEmail'].")";
	
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
		
		
		$sql = "SELECT * from textposts,users, location where userEmail IN (SELECT secondUser as matches FROM usermatchescontains
		WHERE firstUser = '$currUser'
		UNION SELECT firstUser FROM usermatchescontains
		WHERE secondUser = '$currUser'
		UNION  SELECT '$currUser')
		AND users.email = textposts.userEmail AND textposts.location = location.locID order by dateTime DESC";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th class='border-class'>Post Feed</th></tr>
			<tr><th class='border-class'>User</th>
			<th class='border-class'>Time Posted</th>
			<th class='border-class'>Location</th>
			<th class='border-class'>Content</th>
			<th class='border-class'>Mood</th>
			<th class='border-class'>Reacts</th>
			</tr>"; // output data of each row
			while($row =
			$result->fetch_assoc()) {
				
				
				if ($row["userEmail"] == $currUser) {
					$sender = "You";
					} else {
					$sender = $row["firstName"]. " ". $row["lastName"] ;
				}
				$postID = $row["postID"];
				
				$sql = "SELECT postID, users.email, firstName, lastName, reactiontext.type type,reactionText from users, reactiontext,reactstextposts WHERE postID = $postID 
				AND reactstextposts.type = reactiontext.type AND users.email = reactstextposts.userEmail ORDER BY type ASC";
				$reacts = $conn->query($sql);
				
				$reacttexts = "";
				if ($reacts->num_rows > 0){
					while($reactrow = $reacts->fetch_assoc()){
						$reacttexts .= $reactrow["firstName"]." ".$reactrow["lastName"]." ".$reactrow["reactionText"].", ";
					}
					$reacttexts = substr($reacttexts,0,-2);
				}
				
				echo "<tr><td class='border-class'>".$sender."</td>
				<td class='border-class'>".$row["dateTime"]."</td><td
				class='border-class'>".$row["city"].", ". $row["province"]."</td><td
				class='border-class'>".$row["content"]."</td><td
				class='border-class'>".$row["textMood"]."</td>
				<td class='border-class'>".$reacttexts."</td></tr>";
				echo "<tr><td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td></tr>";
				unset($reacttexts);
				unset($reacts);
				unset($postID);
			}
			
			echo "</table>";
		} else {echo "\n No posts yet... say hi :)";}
		CloseCon($conn);
	}
	///TODO: REACT TO POSTS
	///SEPARATE BETWEEN TEXT AND PHOTO POSTS WHEN POSTING
	
	///POST ID IS NEGATIVE if Picture
	///Post ID IS POSITIVE IF TEXT
	
	
	
?>


<form method="POST" onAction="homefeed.php">
	Type Here: <input type="text" name="text" size="50" placeholder="Type status here">
	Mood: <input type="text" name="mood" size="20" placeholder="Happy">
	City: <input type="text" name="city" size="15" placeholder="Vancouver">
	<select id="province" name="province" >
		<option value="" disabled selected>Select your option</option>
		<option value="AB">AB</option>
		<option value="BC">BC</option>
		<option value="MB">MB</option>
		<option value="NB">NB</option>
		<option value="NL">NL</option>
		<option value="NS">NS</option>
		<option value="ON">ON</option>
		<option value="PE">PE</option>
		<option value="QC">QC</option>
		<option value="SK">SK</option>
		<option value="NT">NT</option>
		<option value="NU">NU</option>
		<option value="YT">YT</option>   
	</select>
    <input type="submit" name="post" onClick>
</form>
