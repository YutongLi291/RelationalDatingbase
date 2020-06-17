<?php
    include_once 'connect.php';
	session_start();

	if (empty($_GET['reacts'])) {
		removeReact();
	}
	else{
		react();
	}

	header("Location: text_homefeed.php");	

	function removeReact() {
		$conn = OpenCon();
		
		$postID = $_GET["pID"];
		$currUser = $_SESSION['userEmail'];

		$sql="DELETE FROM reactstextposts WHERE userEmail='$currUser' AND postID =$postID";
		$conn->query($sql);	
			
	}

    function react() {
	
        $conn = OpenCon();
		
		$reaction = $_GET["reacts"];
		$postID = $_GET["pID"];
		$currUser = $_SESSION['userEmail'];

		//CHECK IF ALREADY REACTED >> replace
		$sql = "SELECT * FROM reactstextposts WHERE userEmail='$currUser' AND postID = $postID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sql = "UPDATE reactstextposts
			SET type='$reaction'
			WHERE postID=$postID and userEmail='$currUser'";
			$conn->query($sql);
		} else {
			$sql = "INSERT INTO reactstextposts VALUES ($postID, '$currUser', '$reaction')";
			$conn->query($sql);
		}
	}
?>
