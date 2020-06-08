<?php
    session_start();
    $_SESSION['userEmail'] = "bbbb@hotmail.com";
    $_SESSION['cID'] = 5;
    // so we know who's logged in. We already know the conversation.

    include 'connect.php';
    $conn = OpenCon();
    $currUser = $_SESSION['userEmail'];
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

    $sql = "SELECT * from hasusermessages where userEmail='$currUser'";
    //  where userEmail=$currUser and cId=$currCID order by timeSent
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th class='border-class'>Messaging</th>
        <tr>
        <tr><th class='border-class'>User</th>
        <th class='border-class'>TimeSent</th>
        <th class='border-class'>Message</th></tr>";// output data of each row
        while($row = 
        $result->fetch_assoc()) { 
            if ($row["userEmail"] = $_SESSION["userEmail"]) {
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
?>

<form action="conversation.php" method="post">
        Type Here: <input type="text" name="text" size="100" placeholder="say something nice">
        <input type="submit">
</form>
