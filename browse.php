<!-- //FIRST GET A RANDOM PERSON THAT THIS USER HASN'T SWIPED LEFT YET WITH MATCHING GENDER
//GIVE USER OPTION TO SWIPE LEFT OR RIGHT
//UPDATE DATABASE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
</head>
<body>
    
    <?php 
    include 'connect.php';
    session_start();


        // default starting account
        if (!isset($_SESSION['username'])) {
            session_start();
            setCurrCID(5);
            setCurrUser("bbbbra@hotmail.com");
        } 
    
        if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
        if (isset($_POST['cID'])) setCurrCID($_POST['cID']);
    
        if (isset($_POST['text'])) {
            send();
        }
        echo "You are logged in as ".$_SESSION['username']." in conversation cID ".$_SESSION['cID'];
    
    
    getMatch();

    function getMatch() {
        $conn = OpenCon();
        $userEmail = $_SESSION['username'];
        // setting gender and genderpref to sessions
        // use later in swipe_save.php
        if(!isset($_SESSION['gender']) || !isset($_SESSION['genderPref'])) {
            $sql = "SELECT * from users where users.email = '$userEmail'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION['genderPref'] = $row["prefersGender"];
            } else {
                echo "get user gender and genderPref error";
            }
        }
        // get te next random match whenever this page is reloaded
        // todo: prioritize showing people who have already swiped you, otherwise just matching profiles in regards to gender pref
        $genderPref = $_SESSION['genderPref'];

        $sql = 
        "SELECT * from users u, photos p
        where u.gender='$genderPref' and u.profile_pic=p.pID and u.email NOT IN (
            SELECT secondUser from usermatchescontains
            where firstUser='$userEmail'
            UNION
            SELECT firstUser from usermatchescontains
            where secondUser='$userEmail'
        )
        order by RAND() limit 1";
    

        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            // this is the lucky person!
            $_SESSION['m_img_link'] = $row['link'];
            $_SESSION['m_name'] = $row['firstName']." ".$row['lastName'];
            $_SESSION['swipeeEmail'] = $row['email'];
        } else {
            unset($_SESSION['m_img_link']);
            unset($_SESSION['m_name']);
            unset($_SESSION['swipeeEmail']);
        }
    }  
    ?>

    <form id="swipe_form" onsubmit="" action="swipe_save.php" method="post">
    <!-- link to image stored inside session -->
    <h2>
        <?php 
        if (isset($_SESSION['m_name'])) {
            echo $_SESSION['m_name'];
        } else {
            echo "sorry no matches at this time!";
        }?>
    </h2>
    <!-- profile picture -->
    <img src=<?php 
    if (isset($_SESSION['m_img_link']))
        echo $_SESSION['m_img_link'];
        ?>>
    <p>

    <button type="submit" name="match">Yes</button>

    <button type="submit" name="no_match">No</button>
</body>
</html>

<?php











?>