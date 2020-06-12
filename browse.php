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
        $sql = "SELECT * from users, photos where gender='$genderPref' and profile_pic=pID order by RAND() limit 1";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            // this is the lucky person!
            $_SESSION['m_img_link'] = $row['link'];
            $_SESSION['m_name'] = $row['firstName']." ".$row['lastName'];
        } else {
            $_SESSION['m_name'] = "Sorry no matches!";
        }
    }  
    ?>

    <form id="swipe_form" onsubmit="" action="swipe_save.php" method="post">
    <!-- link to image stored inside session -->
    <h2><?php echo $_SESSION['m_name']?></h2>
    <!-- profile picture -->
    <img src=<?php echo $_SESSION['m_img_link'];?>>
    <p>

    <button type="submit" name="match">Yes</button>

    <button type="submit" name="no_match">No</button>
</body>
</html>

<?php











?>