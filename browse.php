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
    <br><br><br><br><br><br>
    <h1>Find Your Match!</h1>
    <p class="center">This select 'yes' to swipe right, 'no' to swipe left. 
        <br>
        The next user is randomly drawn and matches your gender preference and you have not yet swiped right on (in this session).
    </p>

    <?php 
    include 'connect.php';
    include 'header.php';
    session_start();

        // default starting account
        if (!isset($_SESSION['userEmail'])) {
            session_start();
            setCurrCID(5);
            setCurrUser("bbbbra@hotmail.com");
        } 

        if (isset($_POST['loginAs'])) setCurrUser($_POST['loginAs']);
        if (isset($_POST['cID'])) setCurrCID($_POST['cID']);
    
        if (isset($_POST['text'])) {
            send();
        }
        echo "<p class=\"center\">You are logged in as ".$_SESSION['userEmail']."</p>";
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
        $conn = OpenCon();
        if(!isset($_SESSION['genderPref'])) {
            $sql = "SELECT * from users where users.email = '$userEmail'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
                $_SESSION['genderPref'] = $row["prefersGender"];
            } else {
                echo "<p class=\"center\">get user gender and genderPref error</p>";
            }
        }
    }

    // returns average# matches over all users
    function getAvgMatches() {
        $conn = OpenCon();
        $avgMatch_sql = 
        "SELECT avg(totalMatches) as average
        from(
            select email, sum(count) totalMatches
               from (
       
               SELECT firstUser as email, COUNT(secondUser) as count
               FROM usermatchescontains
               GROUP BY firstUser
               UNION ALL
               SELECT secondUser as email, COUNT(firstUser) as count
               FROM usermatchescontains
               GROUP BY secondUser
                   ) as hello
            group by email
            
           ) as allUsers";
        
        $result = $conn->query($avgMatch_sql);
        if ($row = $result->fetch_assoc()) {
            return $row['average'];
        } else {
            echo "error";
            return 0;
        }
        CloseConn($conn);
    }

    // returns number of matches to the given email
    function getUserMatches($email) {
        $conn = OpenCon();
        $user_num_matches_sql = 
        "SELECT sum(count) totalMatches
        from (

        SELECT COUNT(*) as count
        FROM usermatchescontains
        WHERE firstUser='$email'
        UNION ALL
        SELECT COUNT(*) as count
        FROM usermatchescontains
        WHERE secondUser='$email'
        ) as hello";

        $result = $conn->query($user_num_matches_sql);
        if ($row = $result->fetch_assoc()) {
            return $row['totalMatches'];
        } else {
            echo "error";
            return 0;
        }
        CloseConn($conn);
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
            $selectMatches_sql = 
            "SELECT * from users u, photos p
            where u.email!='$userEmail' and u.profile_pic=p.pID and u.email NOT IN ("
                .$alreadyMatched_sql.
            ")
            order by RAND() limit 1";
        } else {
            $selectMatches_sql = 
            "SELECT * from users u, photos p
            where u.email!='$userEmail' and u.gender='$genderPref' and u.profile_pic=p.pID and u.email NOT IN ("
                .$alreadyMatched_sql.
            ")
            order by RAND() limit 1";
        }
    
        // select match
        $result = $conn->query($selectMatches_sql);
        if ($row = $result->fetch_assoc()) {
            // this is the lucky person!
            $_SESSION['m_img_link'] = $row['link'];
            $_SESSION['m_name'] = $row['firstName']." ".$row['lastName'];
            $_SESSION['m_bio'] = $row['description'];
            $_SESSION['swipeeEmail']= $row['email'];
            
            // notification in case only one choice left
            if ($_SESSION['swipeeEmail'] == $row['email']) {
                echo "<p class=\"center\">Looks like you're stuck with this one!</p>";
            } else {
                $_SESSION['swipeeEmail'] = $row['email'];
            }
               
        } else {
            unset($_SESSION['m_img_link']);
            unset($_SESSION['m_name']);
            unset($_SESSION['swipeeEmail']);
            unset($_SESSION['m_bio']);
        }
    }  
    ?>

<!-- notification of actions -->
    <p class ="center"><?php 
        if (isset($_SESSION["matchMadeWith"])) {
            echo "Match made with ".$_SESSION["matchMadeWith"];
        } else if (isset($_SESSION["swipeMadeWith"])) {
            echo "Swiped ".$_SESSION["swipeMadeWith"];
        }
        unset($_SESSION["matchMadeWith"], $_SESSION["swipeMadeWith"]);
    ?></p>

    <form id="swipe_form" onsubmit="" action="swipe_save.php" method="post">
        
        <!-- profile picture -->
        <img id="browse_profilepic" class="center" src=<?php 
        if (isset($_SESSION['m_img_link']))
            echo $_SESSION['m_img_link'];
            ?> >
        <!-- match name -->
        <h3 class="center"><?php 
        if (isset($_SESSION['m_name'])) {
            echo $_SESSION['m_name'];
        } else {
            echo "sorry no matches at this time!";
        }
        ?></h3>
        <!-- match bio -->
        <p class="center"><?php
            if(isset($_SESSION['m_bio'])) echo $_SESSION['m_bio'];
        ?></p>

        <!-- warning if match has more matches than average -->
        <p class="center"><?php
            $average = getAvgMatches();
            $matchMatches = getUserMatches($_SESSION['swipeeEmail']);
            echo "This user has ".$matchMatches." matche(s) while the average is ".$average.".";
            if ($average < $matchMatches) {
                echo "Watch out, this user has an above average number of matches!";
            }
        ?></php>

        <br>
        <button id="swipeRightButton" class="center" type="submit" name="match" >Swipe Right</button>
        <button id="swipeLeftButton" class="center" type="submit" name="no_match">Random</button>
        <br>
    </form>

    <!-- <form id="filter_form" action="profile_redirect.php" method="post" class="center">
        <button type="submit" name="goto_profile" id="gotoProfileButton">
            <?php
            // echo "View ".$_SESSION['m_name']."'s Profile"; ?>
    </button>
    </form> -->

    <form id="filter_form" action="apply_filter.php" method="post" class="center">
        <button type="submit" id="toggleAllBrowseButton" name="apply_filter">
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