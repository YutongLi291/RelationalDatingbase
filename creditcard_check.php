<?php

include 'connect.php';
$pan = $_POST['pan'];
$cardholder= $_POST['cardholder'];
$expirationdate = $_POST['expirationdate'];
$company= $_POST['company'];
$useremail = $_POST['useremail'];

$conn = OpenCon();

$sql = "INSERT INTO creditcards (PAN, cardholder, expirationDate, company, userEmail) VALUES('$pan', '$cardholder', '$expirationdate', '$company', '$useremail')";

if ($conn->query($sql) === TRUE) {
  header("Location: signup_success.php");
} else {
  echo "Credit card error";
}

CloseCon($conn);
?>
