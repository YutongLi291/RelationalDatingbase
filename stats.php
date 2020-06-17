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

	<h1><br><br><br><br>Congrats, You Found This Page!</h1>
	<h3 class="center"><br><br><br><br><br>...<br><br><br><br>Are you taking CPSC304?</h3>
	<h1><br><br><br><br><br><br><br>LIKE A NERD?!<br><br></h1>
	<h3 class="center"><br><br>Here There Be Database Secret Info<br>-----------------------</h3>
		<?php
			include 'connect.php';
			include 'header.php';
			session_start();
            $conn = OpenCon();
            
			$sql = "SELECT count(*) from users";
            $result = $conn->query($sql);
            $numUsers = $result->fetch_assoc()['count(*)'];
            echo "<p class=\"center\">Number of Users Registered: {$numUsers}</p>";
			
			//FIND USER With the MOST MATCHES
			$sql = 
			"SELECT firstName, lastName FROM users,
            (SELECT user FROM (SELECT firstuser user  FROM  usermatchescontains UNION ALL SELECT seconduser user FROM usermatchescontains) as u01
            WHERE user 
            NOT IN 
            (SELECT u1.user FROM 
			(SELECT count(user) count, user FROM(SELECT firstuser user  FROM  usermatchescontains WHERE usermatchescontains.firstUser ||usermatchescontains.secondUser IS NOT NULL UNION ALL SELECT seconduser user FROM usermatchescontains WHERE  usermatchescontains.firstUser ||usermatchescontains.secondUser IS NOT NULL) as u11 GROUP BY user ) u1
			CROSS JOIN
			(SELECT count(user) count, user FROM (SELECT firstuser user FROM  usermatchescontains WHERE usermatchescontains.firstUser ||usermatchescontains.secondUser IS NOT NULL UNION ALL SELECT seconduser user FROM usermatchescontains WHERE usermatchescontains.firstUser ||usermatchescontains.secondUser IS NOT NULL) as u21 GROUP BY user) u2
			where u1.count < u2.count
             )) as topusers WHERE users.email = topusers.user
			";
			$result = $conn->query($sql);
			if ($topuser = $result->fetch_assoc()) {
				echo "<p class=\"center\">User with the most matches: ".$topuser['firstName']." ".$topuser['lastName']." (Watch out for this person)";
			} else {
				echo "<p class=\"center\">There is no top user at the moment!";
			}
			
			///NUMBER OF TOTAL MESSAGES SENT
			$sql = "SELECT count(*) as count from hasusermessages";
			$result = $conn->query($sql);
			$totalmessages = $result->fetch_assoc();
			echo "<p class=\"center\">Total number of messages sent: " .$totalmessages['count']. "</p>";
			
			 /// AVERAGE number of MATCHES found
			$sql = "SELECT avg(totalMatches) as average from (
                select email, sum(count) totalMatches from (
                  SELECT firstUser as email, COUNT(secondUser) as count
                  FROM usermatchescontains
                  GROUP BY firstUser
                  UNION ALL
                  SELECT secondUser as email, COUNT(firstUser) as count
                  FROM usermatchescontains
                  GROUP BY secondUser
                ) as matchedSum
               where email is not null
               group by email
               
               UNION
               
               SELECT email, 0
               FROM users
               WHERE email NOT IN (
                   SELECT firstuser from usermatchescontains where firstuser is not null
                   UNION
                   SELECT seconduser from usermatchescontains where seconduser is not null
                )
            ) as allUsers";
		   $result = $conn->query($sql);
		   $avgmatches = $result->fetch_assoc();
		   echo "<p class=\"center\">Average number of matches found for each user: " .$avgmatches['average']. "</p>";

		?>


		<h3>Find users who have been to (posted in) these locations:</h3>
		<!-- users who have posted at all the chosen locations! -->

		<form method="POST" action="find_user_location_post.php">
			<?php
			$loc_sql="SELECT * from location";
			$result = $conn->query($loc_sql);
			while ($row = $result->fetch_assoc()) {
				$curr_ID=$row['locID'];
				$curr_province=$row['province'];
				$curr_city=$row['city'];
				echo "<input type=\"checkbox\" name={$curr_ID}>
				<label for={$curr_ID}>{$curr_city} {$curr_province}</label><br>";
			}
			?>
			<select id="attribute" name="attribute" >
	<option value="" disabled selected>Select what attribute you want</option>
	<option value="Email">Email</option>
	<option value="Name">Name</option>
	<option value ="Both">Both</option></select>
			<button name="button" type="submit">Submit</button>
		</form>

		<h3 class="center">
			Results:<br>-----------<br>
			<?php
				if (isset($_SESSION['loc_users'])) {
					echo $_SESSION['loc_users'];
				} else {
					echo "no users fit the requirements, please select something different:";
				} 
				?>
		</h3>
		
	</body>
</html>