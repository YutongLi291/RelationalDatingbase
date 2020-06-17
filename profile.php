<?php
session_start();
if(isset($_SESSION['userEmail'])){

}else{
	header("location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>PROFILE</title>
		<link rel="stylesheet" href = "styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	</head>
	<body>

		<?php
			include 'connect.php';
			include 'header.php';
			$email = $_SESSION['userEmail'];

			$conn = OpenCon();
			$sql = "SELECT * FROM users WHERE email ='". $email ."'";
			$result = $conn->query($sql);


			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					$firstname= $row["firstName"];
					$lastname= $row["lastName"];
					$nickname= $row["nickName"];
					$email= $row["email"];
					$description= $row["description"];
					$age= $row["age"];
					$location= $row["location"];
					$gender= $row["gender"];
					$prefersgender= $row["prefersGender"];
					$relationship= $row["relationship"];
					$profilepic= $row["profile_pic"];
			}
			else {
				echo "0 results for users";
			}
			echo $description;

			echo "<div id='profilecover'>";
				echo "<div class='maxwidth profiletop'>";
					$sqlphoto = "SELECT * FROM photos WHERE pID ='". $profilepic ."'";
					$profilephoto = $conn->query($sqlphoto);

					$sqllocation= "SELECT * FROM location WHERE locID ='". $location ."'";
					$profilelocation = $conn->query($sqllocation);

					$sqlrelationship= "SELECT * FROM relationships WHERE rID ='". $relationship ."'";
					$profilerelationship = $conn->query($sqlrelationship);

					if ($profilephoto->num_rows > 0) {
						for($i=0; $i<1; $i++){
							$photo = $profilephoto->fetch_assoc();

							// PROFILE PHOTO ON TOP COLUMN
							echo "<div class='profileleft'>";
								echo "<div id='profilephoto'><img src='".$photo["link"]."'/></div>";
							echo "</div>";
						}
					}
					else {
						echo "0 results for photo";
					}
					echo "<div class='profileright'>";
						echo "<br><br><h2>".$firstname." ".$lastname."</h2>";
						echo "<p>You can call me <span style='margin-left:10px;'>".$nickname."</span></p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "<div id='profileinfo'>";
				echo "<div class='maxwidth profilebottom'>";
					echo "<p><span class='profiletextvalue'> Age </span><span class='profiletextbold'>".$age."</span></p>";
					if ($profilelocation->num_rows > 0) {
						$exactlocation = $profilelocation->fetch_assoc();
						echo "<p><span class='profiletextvalue'> Location </span><span class='profiletextbold'>".$exactlocation["city"].", ".$exactlocation["province"]."</span></p>";
					}
					else {
						echo "0 results for location";
					}

					echo "<p><span class='profiletextvalue'> Preferred gender </span><span class='profiletextbold'>".$gender."</span></p>";

					if ($profilerelationship->num_rows > 0) {
						$therelationship = $profilerelationship->fetch_assoc();
						echo "<p><span class='profiletextvalue'> Preferred relationship </span><span class='profiletextbold'>".$therelationship["description"]."</span></p>";
					}
					else {
						echo "0 results for location";
					}

					echo "<p><span class='profiletextvalue'> A little bit about myself:</p><p class='profiletextvalue'><i style='font-size:14px;'>\"".$description."\"</i></span></p>";
					
				echo "</div>";
			echo "</div>";
			echo "<div class='profilelocation'>";
				echo "<p> We are continuously expanding. <br> Today, these are the cities in <span>".$exactlocation["province"]."</span> that we are currently operating in:</p><br>";
					$cities= "SELECT city FROM location WHERE province ='". $exactlocation["province"] ."'";
					$citiesresult= $conn->query($cities);
					if ($citiesresult->num_rows > 0) {
						while($citylist = $citiesresult->fetch_assoc()){
							echo "<b class='citylist'> ".$citylist["city"]."</b>";
						}
						echo "<br>";
					}
					else {
						echo "We do not have any location in this province yet.";
					}
				echo "<br>";

				echo "<form action='profilelocationcheck.php' method='post' id='locationdropdown' name='provincecheck' target='_blank'>";
					echo "<p> Select province to find out where else we are operating in Canada </p>";
					//onchange is javascript code. Provincecheck refers to the name of the form.
					echo "<select id='province' name='citylocation' onchange='provincecheck.submit();'>
						<option value='' disabled selected>Select province</option>
					    <option value='AB' ". (($exactlocation["province"] == 'AB')? "disabled":"").">AB</option>
					    <option value='BC' ". (($exactlocation["province"] == 'BC')? "disabled":"").">BC</option>
					    <option value='MB' ". (($exactlocation["province"] == 'MB')? "disabled":"").">MB</option>
					    <option value='NB' ". (($exactlocation["province"] == 'NB')? "disabled":"").">NB</option>
					    <option value='NL' ". (($exactlocation["province"] == 'NL')? "disabled":"").">NL</option>
					    <option value='NS' ". (($exactlocation["province"] == 'NS')? "disabled":"").">NS</option>
					    <option value='NT' ". (($exactlocation["province"] == 'NT')? "disabled":"").">NT</option>
					    <option value='NU' ". (($exactlocation["province"] == 'NU')? "disabled":"").">NU</option>
					    <option value='ON' ". (($exactlocation["province"] == 'ON')? "disabled":"").">ON</option>
					    <option value='PE' ". (($exactlocation["province"] == 'PE')? "disabled":"").">PE</option>
					    <option value='QC' ". (($exactlocation["province"] == 'QC')? "disabled":"").">QC</option>
						<option value='SK' ". (($exactlocation["province"] == 'SK')? "disabled":"").">SK</option>
					    <option value='YT' ". (($exactlocation["province"] == 'YT')? "disabled":"").">YT</option>";
					echo "</select><br>";
				echo "</form><br><br>";

				if(isset($_SESSION["cities"])){
                    $citiestodisplay = $_SESSION["cities"];
                    $citiesresult= $conn->query($citiestodisplay);
                    echo "<span>".$_SESSION["province"]."</span><br><br>";
                    if ($citiesresult->num_rows > 0) {
						while($morecitylist = $citiesresult->fetch_assoc()){
							echo "<b class='citylist'> ".$morecitylist["city"]."</b>";
						}
					}
					else {
						echo "We do not have any location in this province yet.";
					}
					unset($_SESSION["cities"]);
                }
			?>
			</div>
			<div class="profiledeactivate">
				<br><br><br><a href='profiledelete.php'><button class='deactivatebutton'> Deactivate my account </button></a><br><br><br><br>
			</div>

			<!-- link to stats page -->
			<div>
				<a href='stats.php'><button> Secret Database Stats OHOHOHOHOHO ( ͡° ͜ʖ ͡°)</button></a>
			</div>
	</body>
</html>
