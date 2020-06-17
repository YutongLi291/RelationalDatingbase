<?php
    include_once 'connect.php';
    
	
    // function run($obConn,$sql)
    // {
    //     $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
	// }
	
	
    function post() {
        $conn = OpenCon();
        // find postID of next text post to post
        
        
            //Finf max postID
            $sql =
            "SELECT max(postID) as postID from textposts;";
			
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $textpostID = $row["postID"] + 1;
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
