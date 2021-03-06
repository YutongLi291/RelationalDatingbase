<?php
    include_once 'connect.php';
    session_start();
    sendMessage();
    echo "message has been sent";
    header("Location: display_chat.php");

?>

<?php
    function run($obConn,$sql)
    {
        $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    }

// pre: $_POST['text'] is set.
    function sendMessage() {
        $conn = OpenCon();

        // find messageID of next message to send
        $currCID = $_SESSION['cID'];
        if (isset($_SESSION["meID"])) {
            $_SESSION["meID"] += 1;
        } else {
            // this is only run if this is the first message the user is sending for the time they've been in this conversation on this site.
            $sql =
            "SELECT meID
            from hasusermessages
            where cID = $currCID
            order by meID DESC";

            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION["meID"] = $row["meID"] + 1;
            } else {
                $_SESSION["meID"] = 1;
            }
        }

        $currUser = $_SESSION["userEmail"];
        $currMeID = $_SESSION["meID"];

        // check for ' and replace with \'
        $text = $_POST['text'];
        $text = str_replace("'", "\'", $text);

        // gets current time
        $sql = "SELECT NOW()";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];

        $sql = "INSERT INTO hasusermessages (meID, timeSent, text, userEmail, cID) VALUES ($currMeID, '$currTime', '$text', '$currUser', $currCID);";
        run($conn,$sql);
        CloseCon($conn);
    }
?>
