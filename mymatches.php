<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>My Matches</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

    <h1><br><br>MY MATCHES</h1>
		<?php
            include 'connect.php';
            include 'header.php';
            $conn = OpenCon();
            session_start();
            

            $userEmail=$_SESSION['userEmail'];

            $sql = 
            "SELECT * from users where email in 
            (SELECT umc.secondUser from usermatchescontains umc 
            where umc.firstUser='$userEmail'
            UNION
            SELECT umc.firstUser from usermatchescontains umc 
            where umc.secondUser='$userEmail')";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) echo "<h3 class=\"center\">No matches yet...<p><br><br><br><br><br><br>Go getem' tiger!</h3>";
            while($row = $result->fetch_assoc()) {
                // display name and profile
                $matchName="{$row["firstName"]}-{$row["lastName"]}";
                $matchEmail="{$row["email"]}";
                echo "<tr><td class='border-class'>
                
                <form method=\"post\" action=\"match_profile.php\" class=\"mymatch\">
                    <input type=\"submit\" value={$matchName} name=\"viewProfileButton\"  onClick>
                    <input name=\"matchEmail\" type=\"hidden\" value=$matchEmail>
                    <td class='border-class'></td></tr>
                </form>
                </td>"
                ;
            }   
		?>
	</body>
</html>