<?php
    include_once 'connect.php';
    session_start();
	
    function run($obConn,$sql)
    {
        $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
	}
	
	
    function post() {
        $conn = OpenCon();
        // find postID of next text post to post
        
        if (isset($_SESSION["postID"])) {
            $_SESSION["postID"] += 1;
			} else {
            // this is only run if this is the first post the user is posting
            $sql =
            "SELECT max(postID) as postID from textposts;";
			
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION["postID"] = $row["postID"] + 1;
				} else {
                $_SESSION["postID"] = 1;
			}
		}
		$city = $_POST["city"];
		$province = $_POST["province"];
		$sql = "SELECT locID FROM location WHERE LOWER(city) LIKE LOWER('$city') AND province = '$province';";
		$result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
			$locID= $row["locID"] ;
            } else {          ///RUN if location is not in location database
			$sql = "(SELECT max(locID) +1 as id from location);";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$locID = $row["id"];
			$sql =
            "INSERT INTO location (locID, province, city) VALUES ($locID, '$province', '$city')";
			$result = $conn->query($sql);
			
		}
		
        $currPostID = $_SESSION["postID"];
        $mood = $_POST["mood"];
        $text = $_POST["text"];
		$currUser = $_SESSION['userEmail'];
		
        
		
        // gets current time
        $sql = "SELECT NOW()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];
		
        $sql = "INSERT INTO textposts (postID, location, userEmail, dateTime,textMood, content) VALUES ($currPostID, $locID, '$currUser', '$currTime', '$mood', '$text');";
        run($conn,$sql);
		unset($_POST['text']);
	}
?>