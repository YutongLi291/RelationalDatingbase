<?php
function run($obConn,$sql)
{
	$rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
}

// find messageID of next message to send
$currCID = $_SESSION["cID"];
if (isset($_SESSION["meID"])) {
    $_SESSION["meID"] += 1;
} else {
    // this is only run if this is the first message the user is sending for the time they've been in this conversation on this site.
    $sql =
    "SELECT meID
    from hasusermessages
    where cID=$currCID
    order by meID DESC";

    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $_SESSION["meID"] = $row["meID"] + 1;
    } else {
        $_SESSION["meID"] = 1;
    }
}

include'connect.php';
$currUser = $_SESSION["userEmail"];
$currCID = $_SESSION["cID"];
$currMeID = $_SESSION["meID"];
$text = $_POST['text'];
$conn = OpenCon();
$sql = "INSERT INTO hasusermessages VALUES($currMeID, 'current time', $text, '$currUser', '$currCID'";
run($conn,$sql);
?>
