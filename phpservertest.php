<?php
    function OpenCon()
    {
        $dbhost = "sql3.freemysqlhosting.net";
        $dbuser ="sql3346244";
        $dbpass ="lKs4jlZnDq";
        $db = "sql3346244";
        $conn = new mysqli($dbhost, $dbuser,
        $dbpass,$db) or die("Connect failed: %s\n". 
        $conn -> error);
        return $conn;
    }

    function CloseCon($conn)
    {
        $conn -> close();
    }
?> 