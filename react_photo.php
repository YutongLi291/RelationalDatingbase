<?php
    include_once 'connect.php';
    session_start();
	
    function run($obConn,$sql)
    {
        $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
	}
	
    function react() {
	
        $conn = OpenCon();
		
        echo "<script>console.log('PHP: " . " "  . "');</script>";
		echo("<script>console.log('PHP: " . " "  . "');</script>");
		$postID = substr($_GET["reacts"],-1);
		$reaction = substr($_GET["reacts"],0,-1);
		$currUser = $_SESSION['userEmail'];
		//CHECK IF ALREADY REACTED
		$sql = "SELECT * FROM reactspicposts WHERE userEmail = '$currUser' AND postID = $postID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$sql = "DELETE FROM reactspicposts WHERE userEmail = '$currUser' AND postID = $postID";
			$conn->query($sql);
		}
		$sql = "INSERT INTO reactspicposts VALUES ($postID, '$currUser', '$reaction')";
		$conn->query($sql);
	
		header("Location: photo_homefeed.php");
	}
?>
