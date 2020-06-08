<?php
function run($obConn,$sql)
{
	$rsResult = mysqli_query($obConn,
$sql) or die(mysqli_error($obConn));
header("Location: https://www.students.cs.ubc.ca/~rainbowz/agestatuses.php");


}

include'connect.php';
$age = $_POST['age'];
$adult= $_POST['adult'];
$conn = OpenCon();
$sql = "INSERT INTO agestatus VALUES($age, '$adult')";
run($conn,$sql);
?>
