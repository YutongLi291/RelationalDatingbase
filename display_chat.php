<?php
    include 'connect.php';
    include "save_message.php";

    // default starting account
    if (!isset($_SESSION['username'])) {
        session_start();
        setCurrCID(5);
        setCurrUser("bbbb@hotmail.com");
    } 

    if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
    if (isset($_POST['cID'])) setCurrCID($_POST['cID']);

    if (isset($_POST['text'])) {
        send();
    }
    echo "You are logged in as ".$_SESSION['username']." in conversation cID ".$_SESSION['cID'];

    start_chat();
?>

<?php
    function setCurrCID($currCID) {
        $_SESSION['cID'] = $currCID;
    }
    function setCurrUser($currUser) {
        $_SESSION['username'] = $currUser;
    }

    function start_chat() {
    
        $conn = OpenCon();
        $currUser = $_SESSION['username'];
        $currCID = $_SESSION['cID'];
    
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
                u.email != '$currUser' AND umc.cID = $currCID AND(
                    u.email = umc.firstUser OR u.email = umc.secondUser
                )";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $partnerName = $row["firstname"]." ".$row["lastname"];
        } else {
            echo "error";
        }
    
        $sql = "SELECT * from hasusermessages where cID=$currCID order by timeSent";
        //  where username=$currUser and cId=$currCID order by timeSent
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<table><tr><th class='border-class'>Messaging</th></tr>
                <tr><th class='border-class'>User</th>
                <th class='border-class'>TimeSent</th>
                <th class='border-class'>Message</th>
            </tr>"; // output data of each row
            while($row = 
            $result->fetch_assoc()) { 
                if ($row["userEmail"] == $currUser) {
                    $sender = "you";
                } else {
                    $sender = $partnerName;
                }
                echo "<tr><td class='border-class'>".$sender."</td><td 
                class='border-class'>".$row["timeSent"]."</td><td 
                class='border-class'>".$row["text"]."</td></tr>";
            }
            echo "</table>";
        } else {echo "no messages yet... say hi :)";}
        CloseCon($conn);
    }
?>


<form method="POST" onAction="save_message.php">
    Type Here: <input type="text" name="text" size="100" placeholder="type here">
    <input type="submit" name="send" onClick>
</form>

<form method="POST" onAction="display_chat.php">
    Your email: <input type="text" name="loginAs" placeholder="bbbbra@hotmail.com">
    cID: <input type="text" name="cID"  placeholder="5">
    <input type="submit" name="send" onClick>
</form>
