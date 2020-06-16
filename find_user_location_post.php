<?php
    include_once 'connect.php';
    session_start();
    $selectedLocationIDs = createList();
    fetchUsers($selectedLocationIDs);
    echo "herpaderp";
    // header("Location: stats.php");
?>

<?php

    // compiles list from post
    function createList() {
        // foreach (index; $_POST) {

        // }

    }

    // main function
    function fetchUsers($selectedLocationIDs) {
        $conn = OpenCon();

        $sql = 
        "SELECT * from users u
        where NOT EXISTS (
            $selectedLocationIDs
            except
            select tp.locID 
            from textposts tp
            where u.email=tp.userEmail
        )";
        $result=run($conn, $sql);
        

        $_SESSION['loc_users'] = "";
        CloseCon($conn);
    }

    function run($obConn,$sql)
    {
        return mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    }

?>
