<?php
    include_once 'connect.php';
	
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
        
        
            // Find min postID
            $sql =
            "SELECT min(postID) as maxpostID from pictureposts;";
			
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $photopostID = $row["maxpostID"] - 1;
				} else {
                $photopostID = -1;
			}
		
		echo $photopostID;

		$locID = $_POST["city"];
		
        $currPostID = $photopostID;
        $mood = $_POST["mood"];
        $text = $_POST["text"];
		$currUser = $_SESSION['userEmail'];
		$sql = "SELECT NOW()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];
		//to do: change from textposts to picposts
        $sql = "INSERT INTO pictureposts (postID, location, userEmail, dateTime, picMood) VALUES ($currPostID, $locID, '$currUser', '$currTime', '$mood');";
        run($conn , $sql);
        
		//insert photo(s)
		$linkArray = explode(";", $text);
		$valid = 0; //IF NO PHOTOS ARE INSERTED
		foreach( $linkArray as $url ) {
			echo "inserted ".$url." ";
			// if (getimagesize($url)) {
			if (endsWith($url, ".png") || endsWith($url, ".jpg")) {
				$valid = 1; //AT LEAST ONE PHOTO INSERTED
				$sql = "INSERT INTO photos (dateTime, postID, userEmail,link) VALUES ((SELECT NOW()), $currPostID, '$currUser', '$url')";
				run($conn,$sql);
			}
		}

		if ($valid == 0){   //IF NO PHOTOS ARE INSERTED
		$sql = "DELETE FROM pictureposts WHERE postID = $currPostID";
			run($conn,$sql);
		}
				
		unset($_POST['text']);
		header("Location: photo_homefeed.php");
	}
?>
