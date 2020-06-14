<?php
    include_once 'connect.php';
    session_start();
	
    function run($obConn,$sql)
    {
        $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
	}
	///referenced from https://www.geeksforgeeks.org/php-startswith-and-endswith-functions/#:~:text=The%20endsWith()%20function%20is,function%20to%20search%20the%20data.
	function endsWith($string, $endString) 
	{ 
		$len = strlen($endString); 
		if ($len == 0) { 
			return true; 
		} 
		return (substr($string, -$len) === $endString); 
	} 
    function post() {
        $conn = OpenCon();
        // find postID of next text post to post
        
        if (isset($_SESSION["postID"])) {
            $_SESSION["postID"] -= 1;
			} else {
            // this is only run if this is the first post the user is posting
            $sql =
            "SELECT min(postID) as postID from pictureposts;";
			
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION["postID"] = $row["postID"] - 1;
				} else {
                $_SESSION["postID"] = -1;
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
		$sql = "SELECT NOW()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];
		//to do: change from textposts to picposts
        $sql = "INSERT INTO pictureposts (postID, location, userEmail, dateTime,picMood) VALUES ($currPostID, $locID, '$currUser', '$currTime', '$mood');";
        run($conn,$sql);
        
		//insert photo(s)
		$linkArray = explode(";", $text);
		$valid = 0;    ///IF NO PHOTOS ARE INSERTED
		foreach($linkArray as $url){
			if (endsWith($url, ".png")){
			$valid = 1;   //AT LEAST ONE PHOTO INSERTED
			$sql = "INSERT INTO photos (dateTime, postID, userEmail,link) VALUES ((SELECT NOW()), $currPostID, '$currUser', '$url')";
			$conn->query($sql);
			}
		}
		if ($valid == 0){   //IF NO PHOTOS ARE INSERTED
		$sql = "DELETE FROM pictureposts WHERE postID = $currPostID";
			$conn->query($sql);
		}
		
		
		
        // gets current time
		
		unset($_POST['text']);
		 header("Location: photo_homefeed.php");
	}
?>
