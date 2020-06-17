<?php
    include_once 'connect.php';
    session_start();
    $selectedLoc_sql = createList();
    echo $selectedLoc_sql;
    fetchUsers($selectedLoc_sql);
    header("Location: stats.php");
?>

<?php

    // compiles list from post
    // must have at least one thing checked
    function createList() {
        $selectedLoc_sql = " locID in (";
        $hasChecked=0;

        foreach($_POST as $key => $value) {
            if (strstr($value, 'on')) { 
                $selectedLoc_sql .= $key.", "; 
                $hasChecked++;
            }
        }

        if ($hasChecked > 0) {
            $selectedLoc_sql = substr($selectedLoc_sql, 0, -2);
            $selectedLoc_sql .= ") and ";
            return $selectedLoc_sql;
        } else {
            return "";
        }

    }

    // main function
    function fetchUsers($selectedLoc_sql) {
        $conn = OpenCon();
        $returnVal = "";

        // division
        $sql = 
        "SELECT * from users u
        where NOT EXISTS (
            select locID from location where ".$selectedLoc_sql." 
            locID NOT IN (
                select tp.location 
                from textposts tp
                where u.email=tp.userEmail
            union
                select pp.location 
                from pictureposts pp
                where u.email=pp.userEmail
            )            
        );";
        $result =$conn->query($sql);
		if ($_POST['attribute'] == 'Email'){
        while ($row = $result->fetch_assoc()) {
            $returnVal .= " ".$row['email'];
        }
		}
		else if ($_POST['attribute'] == 'Name'){
		while ($row = $result->fetch_assoc()) {
            $returnVal .= " ".$row['firstName']." " .$row['lastName']."   ";
        }}
		else if ($_POST['attribute'] == 'Both'){
		while ($row = $result->fetch_assoc()) {
		$returnVal .= " ".$row['email'].": ".$row['firstName']." " .$row['lastName']. "     ";
		}
		}
		

        if ($returnVal == "") {
            unset($_SESSION['loc_users']);
        } else {
            $_SESSION['loc_users'] = $returnVal;
        }
        CloseCon($conn);
    }
?>
