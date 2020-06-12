<?php
include 'connect.php';

echo "swipe_save.php\n";
session_start();

if (isset($_POST["match"])) {
    makeMatch();
} else if (isset($_POST["no_match"])) {
    removeMatch();
}

function makeMatch() {
    // adds new match to database
    // creates a new conversation
    $conn = OpenCon();
    $currUser = $_SESSION['username'];
    
    // getting next ID
    $sql = "SELECT max(sID) from swipes";
    $next_sID = 1;
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $next_sID = $row['max(sID)'] + 1;
    }

    // get target
    $target = "";

    // insert new swiping info
    $sql = 
    "INSERT into swipes (sID, swiper, swipee) values ($next_sID, '$currUser', '$target')";
    $conn->query($sql);
        
    // check if the target has swiped currUser
    $sql = "SELECT * from swipes where swiper='$target' and swipee='$currUser'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        // get date

        // make new conversation
        $sql = "SELECT max(cID) from conversations";
        $newCID = 1;
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $newCID = $row['max(cID)'] + 1;
        }
        $sql = "INSERT INTO conversations(cID) values ($newCID)";

        // make match
        $sql = "INSERT INTO usermatchescontains (date, firstUser, secondUser, cID) VALUE ('$date', '$target', '$currUser', $newCID";

        echo "MATCH MADE!";
    }
    unset($_POST["match"]);
}

function removeMatch() {
    // removes this user without additional action
    // random goes around comes OURND 
    echo "no";
    unset($_POST["no_match"]);
}

?>