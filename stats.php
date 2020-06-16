<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Stats for Nerds</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

    <h1> STATS PAGE WHY IS THIS HERE???? NO ONE KNOWS </h1>

		<?php
            include 'connect.php';
            include 'header.php';
            $conn = OpenCon();
            
			$sql = "SELECT count(*) from users";
            $result = $conn->query($sql);
            $numUsers = $result->fetch_assoc()['count(*)'];
            echo "<p>Number of Users Registered: {$numUsers}</p>";
			
			//FIND USER With the MOST MATCHES
			$sql = "								
            SELECT firstName, lastName FROM users,
            (SELECT user FROM (SELECT firstuser user  FROM  usermatchescontains UNION ALL SELECT seconduser user FROM usermatchescontains) as u01
            WHERE user 
            NOT IN 
            (SELECT u1.user FROM 
			(SELECT count(user) count, user FROM(SELECT firstuser user  FROM  usermatchescontains UNION ALL SELECT seconduser user FROM usermatchescontains) as u11 GROUP BY user ) u1
			CROSS JOIN
			(SELECT count(user) count, user FROM (SELECT firstuser user FROM  usermatchescontains UNION ALL SELECT seconduser user FROM usermatchescontains) as u21 GROUP BY user) u2
			where u1.count < u2.count
             )) as topusers WHERE users.email = topusers.user
			";
			$result = $conn->query($sql);
			$topuser = $result->fetch_assoc();
            echo "User with the most matches: ".$topuser['firstName']." ".$topuser['lastName']." (Watch out for this person)";
			
			///NUMBER OF TOTAL MESSAGES SENT
			
			$sql = "SELECT count(*) as count from hasusermessages";
			$result = $conn->query($sql);
			$totalmessages = $result->fetch_assoc();
			echo "<p>Total number of messages sent: " .$totalmessages['count']. "</p>";
			
			 /// AVERAGE number of MATCHES found
			$sql = " SELECT avg(totalMatches) as average
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
		   $result = $conn->query($sql);
		   $avgmatches = $result->fetch_assoc();
		   echo "<p>Average number of matches found for each user: " .round($avgmatches['average']). "</p>";
			
		?>
        
		
	</body>
</html>