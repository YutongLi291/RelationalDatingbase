<form action="saveagestatus.php" method="post">
<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * from agestatus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th class='border-
	class'>Age</th><th class='border-class'>Adult? name</th></tr>";// output data of each row
	while($row = 
	$result->fetch_assoc()) { echo "<tr><td class='border-class'>".$row["age"]."</td><td 
class='border-class'>".$row["isAdult"]."</td></tr>";}echo "</table>";} else {echo "0 
results";}
CloseCon($conn);
?>
<h1> ENTER A NEW AGE STATUS (For testing only) </h1>
	<label>Age</label>
    <input name="age" type="text" placeholder="Age">
    <br>
    <label>Adult</label>
    <input name="adult" type="text" placeholder="Adult?">
        <br>
        <br>
    <input type="submit" value="Add value">
</form>