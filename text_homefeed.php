<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Text Feed</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>
	<br><br><br><br>
		<h1>Your Text Feed</h1>
		
		
		
	</body>
</html>
<?php
	include 'connect.php';
	include "save_textpost.php";
	 include 'header.php';
	/// NEED TO KNOW WHO IS LOGGED IN
	
	session_start();

	if(isset($_SESSION['userEmail'])){
	
	}else{
	// header("location: signin.php");
		echo "not set";
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
	include 'react_text.php';
	
	
	if (empty($_GET['reacts'])) {
		//  echo "GET REACTS IS EMPTY";
		removeReact();
	}
	else{
		// echo "pID: ".$_GET['pID'];
		// echo "reaction: ".$_GET['reacts'];
		// echo "REACTS GET NOT EMPTY";
		react();
		
        unset($_GET['reacts']);
	}
	
	
	
	
	
	
	
	
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
			while($row = $result->fetch_assoc()) {
				
				
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
				<td class='border-class'>".$reacttexts."</td><td>";
				
			?>
			
			
			<form onAction='text_homefeed.php' method='GET'>
				
				<select id='reacts' name='reacts' >
					<option value='' disabled selected>Select your option</option>
				<option value="angry"?>Angry</option>
				<option value='like'>Like</option>
				<option value='love'>Love</option>
				<option value='sad'>Sad</option>
				<option value='happy'>Happy</option>
			</select>
			<input type='submit' name='react' onClick>
			<input id="pID" name="pID" type="hidden" value=<?php echo "{$postID}"?>>
		</form></tr>
		<?php
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


<form method="POST" onAction="text_homefeed.php">
	Type Here: <input type="text" name="text" size="50" placeholder="Type status here">
	Mood: <input type="text" name="mood" size="20" placeholder="Happy">
	<select id="city" name="city" >
		<option value="" disabled selected>Select your city</option>
		<option value="9">Burnaby</option>
		<option value="2">Calgary</option>
		<option value="18">Charlottetown</option>
		<option value="11">Edmonton</option>
		<option value="3">Halifax</option>
		<option value="5">Hamilton</option>
		<option value="24">Iqaluit</option>
		<option value="1">Kelowna</option>
		<option value="20">Lethbridge</option>
		<option value="22">Moncton</option>
		<option value="12">Montreal</option>
		<option value="16">Oshawa</option>
		<option value="8">Ottawa</option>
		<option value="7">Quebec</option> 
		<option value="4">Regina</option> 
		<option value="17">Saint John</option> 
		<option value="13">Saskatoon</option> 
		<option value="14">Surrey</option>
		<option value="10">Toronto</option> 
		<option value="0">Vancouver</option> 
		<option value="15">Victoria</option> 
		<option value="21">Whitehorse</option> 
		<option value="23">Windsor</option> 
		<option value="6">Winnipeg</option> 
		<option value="19">Yellowknife</option> 
		</select>
		<input type="submit" name="post" onClick>
		</form>
		
				