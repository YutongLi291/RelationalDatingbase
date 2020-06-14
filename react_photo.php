<?php
    include_once 'connect.php';
	// session_start();
		

	function removeReact() {
		$conn = OpenCon();
		
		$postID = $_GET["pID"];
		$currUser = $_SESSION['userEmail'];

		$sql="DELETE FROM reactspicposts WHERE userEmail='$currUser' AND postID =$postID";
		$conn->query($sql);	
		header("Location: photo_homefeed.php");		
	}


    function react() {
	
        $conn = OpenCon();
		
        // echo "<script>console.log('PHP: " . " "  . "');</script>";
		// echo("<script>console.log('PHP: " . " "  . "');</script>");

		$reaction = $_GET["reacts"];
		$postID = $_GET["pID"];
		$currUser = $_SESSION['userEmail'];

		//CHECK IF ALREADY REACTED >> replace
		$sql = "SELECT * FROM reactspicposts WHERE userEmail='$currUser' AND postID = $postID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// echo "<p>updated on reaction</p>";
			$sql = "UPDATE reactspicposts
			SET type='$reaction'
			WHERE postID=$postID and userEmail='$currUser'";
			$conn->query($sql);
		} else {
			// echo "<p>inserted on reaciton</p>";
			// echo $postID.$currUser.$reaction;
			$sql = "INSERT INTO reactspicposts VALUES ($postID, '$currUser', '$reaction')";
			$conn->query($sql);
		}
	
		header("Location: photo_homefeed.php");		
	}
?>
