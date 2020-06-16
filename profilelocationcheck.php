<?php
session_start();

include 'connect.php';
$email = $_SESSION['userEmail'];
$citiestodisplay = $cities;

$province = $_REQUEST['citylocation'];
echo $province;

$conn = OpenCon();

$cities= "SELECT city FROM location WHERE province ='". $province ."'";
$_SESSION["cities"] = $cities;
$_SESSION["province"] = $province;
header("Location: profile.php");

?>
