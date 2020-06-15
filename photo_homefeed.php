<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Photo Feed</title>
		<link rel="stylesheet" href = "styles.css">
	</head>
	<body>
		<h1>Your Photo Feed</h1>
		<h4>refresh again to see changes to reacts</h4>
		<form action="text_homefeed.php">
			<input type="submit" value="Go to Text Feed" />
		</form>
	</body>
</html>
<?php
	include 'connect.php';
	include "save_photopost.php";
	

	session_start();
	if (!isset($_SESSION['userEmail'])) {
        header("location: signin.php");
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
	
	
	function setCurrUser($currUser) {
	$_SESSION['userEmail'] = $currUser;
	}
	
	function load_feed() {
		
		$conn = OpenCon();
		$currUser = $_SESSION['userEmail'];
		
		// get name of matched users
		$sql = "SELECT pictureposts.userEmail, pictureposts.dateTime as dt,city,province,picMood,link,firstName,lastName, pictureposts.postID  from pictureposts LEFT OUTER JOIN photos ON photos.postID = pictureposts.postID
		,users, location where pictureposts.userEmail IN (SELECT secondUser as matches FROM usermatchescontains
		WHERE firstUser = '$currUser'
		UNION SELECT firstUser FROM usermatchescontains
		WHERE secondUser = '$currUser'
		UNION  SELECT '$currUser')
		AND users.email = pictureposts.userEmail AND pictureposts.location = location.locID order by dt DESC ";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th class='border-class'>Post Feed</th></tr>
			<tr><th class='border-class'>User</th>
			<th class='border-class'>Time Posted</th>
			<th class='border-class'>Location</th>
			<th class='border-class'>Picture</th>
			<th class='border-class'>Mood</th>
			<th class='border-class'>Reacts</th>
			<th class='border-class'>Action</th>
			</tr>"; // output data of each row
			$alreadySeen = array();

			while($row = $result->fetch_assoc()) {
				$postID = $row["postID"];
				if (in_array($postID, $alreadySeen)){
				continue;}
				if ($row["userEmail"] == $currUser) {
					$sender = "You";
					} else {
					$sender = $row["firstName"]. " ". $row["lastName"] ;
				}
				
				$sql = "SELECT postID, users.email, firstName, lastName, rt.type as type, rt.reactionText as text from users, reactiontext rt,reactspicposts WHERE postID = $postID 
				AND reactspicposts.type = rt.type AND users.email = reactspicposts.userEmail ORDER BY type ASC";
				$reacts = $conn->query($sql);
				
				$reacttexts = "";
				while($reactrow = $reacts->fetch_assoc()){
					$reacttexts .= $reactrow["firstName"]." ".$reactrow["lastName"]." ".$reactrow["text"].", ";
				}
				$reacttexts = substr($reacttexts, 0, -2);

				// get photos related to curr postID
				$sql = "SELECT * from photos WHERE postID = $postID";
				$photos = $conn->query($sql);
				$pic = "";
				while ($photorow = $photos->fetch_assoc()){
					$image = $photorow["link"];
					$imageData = base64_encode(file_get_contents($image));
					$pic .= '<img src="data:image/png;base64,' .$imageData.' "width = 35%>';
				}
							
				array_push($alreadySeen, $postID);
				echo "<tr><td class='border-class'>".$sender."</td>
				<td class='border-class'>".$row["dt"]."</td>
				<td class='border-class'>".$row["city"].", ". $row["province"]."</td>
				<td class='border-class'>".$pic."</td><td class='border-class'>".$row["picMood"]."</td>
				<td class='border-class'>".$reacttexts."</td><td>"; 
				?>

			
				<form action='react_photo.php' method='GET'>
					<select id='reacts' name='reacts' >
						<option value='' disabled selected>Select your option</option>
						<option value="angry"?>Angry</option>
						<option value='like'>Like</option>
						<option value='love'>Love</option>
						<option value='sad'>Sad</option>
						<option value='happy'>Happy</option>
					</select>
					<input type='submit' name='react' onClick>
					<input name="pID" type="hidden" value=<?php echo $postID?>>
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

?>


<form method="POST" onAction="photo_homefeed.php">
	Post Image Links (Separate with semicolon(;), png only): <input type="text" name="text" size="50" placeholder="Paste link(s) here">
	Current Mood: <input type="text" name="mood" size="20" placeholder="Happy">
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