<?php
    include_once 'connect.php';
    
		
    function post() {
        $conn = OpenCon();
        // find postID of next text post to post
        
        
            //Find max postID
            $sql =
            "SELECT max(postID) as maxpostID from textposts;";
			
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $textpostID = $row["maxpostID"] + 1;
				} else {
                $textpostID = 1;
			}
		
		$locID = $_POST["city"];
		
            
		
        $currPostID = $textpostID;
        $mood = $_POST["mood"];
        $text = $_POST["text"];
		$currUser = $_SESSION['userEmail'];
		
        
		
        // gets current time
        $sql = "SELECT NOW()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];
		
        $sql = "INSERT INTO textposts (postID, location, userEmail, dateTime,textMood, content) VALUES ($currPostID, $locID, '$currUser', '$currTime', '$mood', '$text');";
        $conn->query($sql);
		unset($_POST['text']);
		header("Location: text_homefeed.php");
	}
?>
