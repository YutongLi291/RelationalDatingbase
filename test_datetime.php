<?php

include 'connect.php';
		$conn = OpenCon();
		$sql = "SELECT TODATETIMEOFFSET(NOW(),'02:00')";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $currTime = $row['NOW()'];
        

?>