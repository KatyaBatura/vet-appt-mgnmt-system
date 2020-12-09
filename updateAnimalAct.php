<?php
include 'connect.php';
$conn = OpenCon();

$animalID=$_POST["AnimalID"];
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

$sql = "UPDATE animal 
SET Name = '$Name', Species = '$Species', Breed = '$Breed', 
Sex = '$Sex', OwnerID_Primary = '$PrimaryOwner', OwnerID_Secondary = '$SecondaryOwner', YearofBirth = '$YearofBirth', LastChanged = current_timestamp()
WHERE AnimalID = '$animalID'";;
$conn->query($sql);

header('location: animalInfo.php?AnimalID=' . $animalID);
die;

CloseCon($conn);
?>
