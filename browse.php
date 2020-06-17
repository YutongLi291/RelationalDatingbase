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
    <p class="center">This select 'Swipe Right' to swipe right, 'Random' to swipe left, 'Block' to block the user. 
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
            header("location: signin.php");
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
        where firstUser='$userEmail' and secondUser is not null
        UNION
        SELECT firstUser from usermatchescontains
        where secondUser='$userEmail' and firstUser is not null
        UNION
        SELECT blockee from blocks where blocker='$userEmail' and blockee is not null
        UNION
        SELECT swipee from swipes where swiper='$userEmail' and swipee is not null";

        // query differs based on user-set filters
        // setting isGenderPref_sql based on button toggle
        if (isset($_SESSION['show_all'])) {
            $isGenderPref_sql="";
        } else {
            $isGenderPref_sql=" and u.gender='$genderPref' ";
        }

        if (isset($_SESSION['show_pic'])) {
            $isPictureShow_sql=" JOIN photos p ON u.profile_pic=p.pID ";
        } else {
            $isPictureShow_sql="";
        }

        // if there are more than one potential matches, avoid showing the same profile twice in a row
        $matchesCount_sql = "SELECT count(*) from users u ".$isPictureShow_sql."
        where u.email!='$userEmail' ".$isGenderPref_sql." and u.email NOT IN ("
            .$alreadyMatched_sql.
        ")";
        if ($conn->query($matchesCount_sql)->fetch_assoc()['count(*)'] > 1 &&
            isset($_SESSION['swipeeEmail'])) {
            $previousEmail =$_SESSION['swipeeEmail'];
            $notDuplicate_sql = " and u.email!='$previousEmail' ";
        } else {
            $notDuplicate_sql="";
        }
            

        $selectMatches_sql = 
        "SELECT * from users u ".$isPictureShow_sql."
        where u.email!='$userEmail' ".$notDuplicate_sql.$isGenderPref_sql." and u.email NOT IN ("
            .$alreadyMatched_sql.
        ")
        order by RAND() limit 1";


        // select match
        $result = $conn->query($selectMatches_sql);
        if ($row = $result->fetch_assoc()) {
            // this is the lucky person!
            if (isset($_SESSION['show_pic'])) $_SESSION['m_img_link'] = $row['link'];
            $_SESSION['m_name'] = $row['firstName']." ".$row['lastName'];
            $_SESSION['m_bio'] = $row['description'];
            
            
            // notification in case only one choice left
            if (isset($_SESSION['swipeeEmail']) && $_SESSION['swipeeEmail'] == $row['email']) {
                echo "<p class=\"center\">Looks like you're stuck with this one!</p>";
				$_SESSION['swipeeEmail']= $row['email'];
				} else {
                $_SESSION['swipeeEmail'] = $row['email'];
            }
            
        } else {
            unsetMatchInfo();
        }
    }
    
    function unsetMatchInfo() {
        unset($_SESSION['m_img_link']);
        unset($_SESSION['m_name']);
        unset($_SESSION['swipeeEmail']);
        unset($_SESSION['m_bio']);
    }

?>

    <!-- notification of actions -->
    <p class ="center"><?php 
        if (isset($_SESSION["matchMadeWith"])) {
            echo "Match made with ".$_SESSION["matchMadeWith"];
        } else if (isset($_SESSION["swipeMadeWith"])) {
            echo "Swiped ".$_SESSION["swipeMadeWith"];
        } else if (isset($_SESSION["blockMadeWith"])) {
            echo "Blocked ".$_SESSION["blockMadeWith"];
        } 
        unset($_SESSION["matchMadeWith"], $_SESSION["swipeMadeWith"],$_SESSION["blockMadeWith"] );
    ?></p>

    <form id="swipe_form" onsubmit="" action="swipe_save.php" method="post">
        
        <!-- profile picture -->
        <img id="browse_profilepic" class="center" src=<?php 
        if (isset($_SESSION['show_pic'], $_SESSION['m_img_link']))
            echo $_SESSION['m_img_link'];
            ?> >
        <!-- match name -->
        <h3 class="center"><?php 
        if (isset($_SESSION['m_name'])) {
            echo $_SESSION['m_name'];
        } else {
            echo "Sorry no matches at this time!<p>You've got 'em all you fox.";
        }
        ?></h3>
        <!-- match bio -->
        <p class="center"><?php
            if(isset($_SESSION['m_bio'])) echo $_SESSION['m_bio'];
        ?></p>

        <!-- warning if match has more matches than average -->
        <p class="center"><?php
            if (isset($_SESSION['swipeeEmail'])) {
                $average = getAvgMatches();
                $matchMatches = getUserMatches($_SESSION['swipeeEmail']);
                echo "This user has ".$matchMatches." match(es) while the average is ".$average.".";
                if ($average < $matchMatches) {
                    echo "<br>Watch out, this user has an above average number of matches!";
                }
            }
        ?></php>

        <br>
        <button id="swipeRightButton" class="center" type="submit" name="match" >Swipe Right</button>
        <button id="swipeLeftButton" class="center" type="submit" name="no_match">Random</button>
		<button id="blockButton" class="center" type="submit" name="block">Block</button>
        <br>
    </form>


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

        <form id="filter_form" action="toggle_profilepic.php" method="post" class="center">
        <button type="submit" name="show_pic" id="hidephoto">
            <?php if (isset($_SESSION['show_pic'])) {
                echo "Hide Profile Picture";
            } else {
                echo "Show Profile Picture";
            }
            ?>
        </button>
        </form>
        <br><br><br><br>

</body>
</html>