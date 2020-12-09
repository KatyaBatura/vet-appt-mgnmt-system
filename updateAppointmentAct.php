<?php
include 'connect.php';
$conn = OpenCon();

$AppointmentID=$_POST["AppointmentID"];
$UserID=$_POST["User"];
$VetID=$_POST["Veterinarian"];
$ClientID=$_POST["Client"];
$AnimalID=$_POST["Animal"];
$Start=$_POST["StartTime"];
$End=$_POST["EndTime"];

$sql = "UPDATE appointment
SET SystemUserID = '$UserID', VetID = '$VetID', ClientID = '$ClientID', AnimalID = '$AnimalID', StartTime = '$Start', EndTime = '$End'
WHERE AppointmentID = '$AppointmentID'"; 
$conn->query($sql);

header('location: appointment.php');
die;

CloseCon($conn);
?>