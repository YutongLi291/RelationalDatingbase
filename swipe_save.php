<?php
include 'connect.php';

echo "swipe_save.php\n";
session_start();

if (isset($_POST["match"])) {
    echo "MATCH";
    makeMatch();
} else if (isset($_POST["no_match"])) {
    echo "REMOVE";
    removeMatch();
}

header("Location: browse.php");

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
    echo $next_sID;

    // get target
    $target = $_SESSION['swipeeEmail'];
    echo $target;

    // insert new swiping info
    $sql = 
    "INSERT into swipes (sID, swiper, swipee) values ($next_sID, '$currUser', '$target')";
    $conn->query($sql);
    $_SESSION["swipeMadeWith"]=$target;
        
    // check if the target has swiped currUser
    $sql = "SELECT * from swipes where swiper='$target' and swipee='$currUser'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) { // just need to check if exists
        // get date
        $sql = "SELECT CURDATE()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $date = $row['CURDATE()'];

        // make new conversation
        // select maximum cID
        $sql = "SELECT max(cID) from conversations";
        $newCID = 1;
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $newCID = $row['max(cID)'] + 1;
        }
        // insert new conversation
        $sql = "INSERT INTO conversations(cID) values ($newCID)";
        $conn->query($sql);

        // make match, inserting into usermatches contains
        $sql = "INSERT INTO usermatchescontains (date, firstUser, secondUser, cID) VALUE ('$date', '$target', '$currUser', $newCID)";
        $conn->query($sql);

        $_SESSION["matchMadeWith"]=$target;
        echo "MATCH MADE!";
    }
}

function removeMatch() {
    echo "nope.";
}

?>