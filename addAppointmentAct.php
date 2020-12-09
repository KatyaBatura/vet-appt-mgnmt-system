<!DOCTYPE html>
<html>
<?php
include 'connect.php';
$conn = OpenCon();

$UserID=$_POST["User"];
$VetID=$_POST["Veterinarian"];
$OwnerID=$_POST["Client"];
$AnimalID=$_POST["Animal"];
$StartTime=$_POST["StartTime"];
$EndTime=$_POST["EndTime"];

$sql = "INSERT INTO appointment (SystemUserID, VetID, ClientID, AnimalID, StartTime, EndTime) 
VALUES ('$UserID', '$VetID', '$OwnerID','$AnimalID', '$StartTime', '$EndTime')";
$conn->query($sql);

header('location: appointment.php');
die;

CloseCon($conn);
?>
</html>