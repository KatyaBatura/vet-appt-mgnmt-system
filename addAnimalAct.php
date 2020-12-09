<?php
include 'connect.php';
$conn = OpenCon();

$Name=$_POST["Name"];
$Species=$_POST["Species"];
$Breed=$_POST["Breed"];
$Sex=$_POST["Sex"];
$YearofBirth=$_POST["YearofBirth"];
$PrimaryOwner=$_POST["Primary"];


if($_POST["Secondary"] == "" || $_POST["Primary"] == $_POST["Secondary"])
	$SecondaryOwner=NULL;
else
	$SecondaryOwner=$_POST["Secondary"];


$sql = "INSERT INTO animal (AnimalID, Name, Species, Breed, Sex, OwnerID_Primary, OwnerID_Secondary, YearofBirth, LastChanged, CreatedOn) 
VALUES (NULL, '$Name', '$Species', '$Breed', '$Sex', '$PrimaryOwner', '$SecondaryOwner', '$YearofBirth', current_timestamp(), current_timestamp())";
$conn->query($sql);

header('location: animal.php');
die;

CloseCon($conn);
?>
