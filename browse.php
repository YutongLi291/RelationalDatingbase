<!-- //FIRST GET A RANDOM PERSON THAT THIS USER HASN'T SWIPED LEFT YET WITH MATCHING GENDER
//GIVE USER OPTION TO SWIPE LEFT OR RIGHT
//UPDATE DATABASE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <p>This select 'yes' to swipe right, 'no' to swipe left. 
        <br>
        The next user is randomly drawn and matches your gender preference and you have not yet swiped right on (in this session).
    </p>

    <?php 
    include 'connect.php';
    session_start();

        // default starting account
        if (!isset($_SESSION['userEmail'])) {
            session_start();
            setCurrCID(5);
            setCurrUser("bbbbra@hotmail.com");
        } 

        // if (!isset($_SESSION['left_swipes'])) {
        //     $_SESSION['left_swipes'] = array();
        // }
    
        if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
        if (isset($_POST['cID'])) setCurrCID($_POST['cID']);
    
        if (isset($_POST['text'])) {
            send();
        }
        echo "You are logged in as ".$_SESSION['userEmail'];
    getMatch();
    ?>

    <?php
    function setCurrCID($currCID) {
        $_SESSION['cID'] = $currCID;
    }
    function setCurrUser($currUser) {
        $_SESSION['userEmail'] = $currUser;
    }

    function setGenderPref($userEmail) {
        if(!isset($_SESSION['genderPref'])) {
            $sql = "SELECT * from users where users.email = '$userEmail'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION['genderPref'] = $row["prefersGender"];
            } else {
                echo "get user gender and genderPref error";
            }
        }

    }

    function getMatch() {
        $conn = OpenCon();
        $userEmail = $_SESSION['userEmail'];
        // set genderpref to sessions
        // use later in swipe_save.php
        // get the next random match whenever this page is reloaded
        // matching profiles in regards to gender pref
        setGenderPref($userEmail);
        $genderPref = $_SESSION['genderPref'];


        $alreadyMatched_sql = 
            "SELECT secondUser from usermatchescontains
            where firstUser='$userEmail'
            UNION
            SELECT firstUser from usermatchescontains
            where secondUser='$userEmail'
            UNION
            SELECT blockee from blocks where blocker='$userEmail'";

        if (isset($_SESSION['show_all'])) {
            $sql = 
            "SELECT * from users u, photos p
            where u.profile_pic=p.pID and u.email NOT IN ("
                .$alreadyMatched_sql.
            ")
            order by RAND() limit 1";
        } else {
            $sql = 
            "SELECT * from users u, photos p
            where u.gender='$genderPref' and u.profile_pic=p.pID and u.email NOT IN ("
                .$alreadyMatched_sql.
            ")
            order by RAND() limit 1";
        }
    

        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            // this is the lucky person!
            $_SESSION['m_img_link'] = $row['link'];
            $_SESSION['m_name'] = $row['firstName']." ".$row['lastName'];
            
            // notification in case only one choice left
            if ($_SESSION['swipeeEmail'] == $row['email']) {
                echo "<p>Looks like you're stuck with this one!</p>";
            } else {
                $_SESSION['swipeeEmail'] = $row['email'];
            }
               
        } else {
            unset($_SESSION['m_img_link']);
            unset($_SESSION['m_name']);
            unset($_SESSION['swipeeEmail']);
        }
    }  
    ?>

<!-- notification of action -->
    <p><?php 
        if (isset($_SESSION["matchMadeWith"])) {
            echo "Match made with ".$_SESSION["matchMadeWith"];
        } else if (isset($_SESSION["swipeMadeWith"])) {
            echo "Swiped ".$_SESSION["swipeMadeWith"];
        }
        unset($_SESSION["matchMadeWith"], $_SESSION["swipeMadeWith"]);
    ?></p>

    <form id="swipe_form" onsubmit="" action="swipe_save.php" method="post">
        <h2><?php 
            if (isset($_SESSION['m_name'])) {
                echo $_SESSION['m_name'];
            } else {
                echo "sorry no matches at this time!";
            }
        ?></h2>
        <!-- profile picture -->
        <img src=<?php 
        if (isset($_SESSION['m_img_link']))
            echo $_SESSION['m_img_link'];
            ?>>
        <br>
        <button type="submit" name="match">Yes</button>
        <button type="submit" name="no_match">No</button>
        <br>
    </form>

    <form id="filter_form" action="apply_filter.php" method="post">
        <button type="submit" name="apply_filter">
            <?php if (isset($_SESSION['show_all'])) {
                echo "Filter By Your Gender Preference";
            } else {
                echo "Show All";
            }
            ?>
        </button>
        </form>
</body>
</html>