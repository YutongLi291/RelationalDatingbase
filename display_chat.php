<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	<br><br><br>
    <title>Chat</title>
</head>
<body>

<?php
    session_start();

    include 'connect.php';
	include 'header.php';

    // default starting account
    if (!isset($_SESSION['userEmail'])) {
        session_start();
        setCurrUser("bbbb@hotmail.com");
    } 
    
    // sets match email if coming from match profile
    if (isset($_POST['matchEmail'])) $_SESSION['matchEmail'] = $_POST['matchEmail'];

    setCurrCID();

    echo "<p>You are logged in as: ".$_SESSION['userEmail'];

    start_chat();
?>

<?php
    // get current cID
    function setCurrCID() {
        $conn = OpenCon();
        $matchEmail = $_SESSION['matchEmail'];
        $userEmail = $_SESSION['userEmail'];
        $sql= "SELECT cID from usermatchescontains 
        where (firstUser='$userEmail' and secondUser='$matchEmail') OR
        (firstUser='$matchEmail' and secondUser='$userEmail')";
        $result = $conn->query($sql);
        $_SESSION['cID'] = $result->fetch_assoc()['cID'];
    }

    function setCurrUser($currUser) {
        $_SESSION['userEmail'] = $currUser;
    }

    function setUserProfilePic($conn) {
        $currUser = $_SESSION['userEmail'];
        $sql = "SELECT link from users, photos where email='$currUser' and pID=profile_pic";

        $result = $conn->query($sql);
        $_SESSION['userProfilePic'] = $result->fetch_assoc()['link'];
    }

    function start_chat() {
    
        $conn = OpenCon();
        $currUser = $_SESSION['userEmail'];
        $currCID = $_SESSION['cID'];

        setUserProfilePic($conn);
    
        // get name of other user
        $sql = 
            "SELECT
                firstname,
                lastname,
                u.email
            FROM
                users AS u,
                usermatchescontains AS umc
            WHERE
                u.email != '$currUser' AND umc.cID = $currCID AND (
                    u.email = umc.firstUser OR u.email = umc.secondUser)";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $partnerName = $row["firstname"]." ".$row["lastname"];
            $partnerEmail = $row["email"];
        } else {
            echo "error";
        }
        
        // get partner profile photo
        $partner_pic_sql = 
            "SELECT link from users u join photos p on u.profile_pic=p.pID where u.email='$partnerEmail'";
        $result = $conn->query($partner_pic_sql);
        $_SESSION["partnerProfilePic"] = $result->fetch_assoc()['link'];

        // get all the messages
        $sql = "SELECT * from hasusermessages where cID=$currCID order by timeSent";
        //  where userEmail=$currUser and cId=$currCID order by timeSent
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = 
            $result->fetch_assoc()) { 
                if ($row["userEmail"] == $currUser) {
                    youSendMessage($row);
                    // $sender = "you";
                } else {
                    theySendMessage($row, $partnerName);
                    // $sender = $partnerName;
                }
            }
            // echo "</table>";
        } else {echo "no messages yet... say hi :)";}
        CloseCon($conn);
    }

    function theySendMessage($row, $sender) {
        $timeSide = "time-right";
        $profile_pic = $_SESSION['partnerProfilePic'];
        echo 
        "<div class=\"container\">".
        "<img src=\"".$profile_pic."\" class=\"left\">"
        .$sender.
        "<p>".$row["text"]."</p>".
        "<span class=\"".$timeSide."\">".$row["timeSent"]."</span></div>";
    }

    function youSendMessage($row) {
        $timeSide = "time-left";
        $sender = "you";
        $profile_pic = $_SESSION['userProfilePic'];
        echo 
        "<div class=\"container darker\">".
        "<img src=\"".$profile_pic."\" class=\"right\">"
        .$sender.
        "<p>".$row["text"]."</p>".
        "<span class=\"".$timeSide."\">".$row["timeSent"]."</span></div>";
    }
?>

<form method="POST" action="save_message.php">
    Type Here: <input type="text" name="text" size="70%" placeholder="type here">
    <button name="send" type="submit">Send</button>
</form>

<!-- account changer (testing) -->
<!-- <form method="POST" onAction="display_chat.php">
    Your email: <input type="text" name="loginAs" placeholder="bbbbra@hotmail.com">
    cID: <input type="text" name="cID"  placeholder="5">
    <input type="submit" name="send" onClick>
</form> -->
</body>
</html>

