<?php
include 'connect.php';
$conn = OpenCon();

$FullName=$_POST["FullName"];
$YearofHire=$_POST["YearofHire"];
$StreetNumber=$_POST["StreetNumber"];
$StreetName=$_POST["StreetName"];

if($_POST["UnitNumber"] == "")
	$UnitNumber=NULL;
else
	$UnitNumber=$_POST["UnitNumber"];

$CityName=$_POST["City"];
$PostalCode=$_POST["PostalCode"];

$sql = "INSERT INTO address (AddressID, UnitNumber, StreetNumber, StreetName, CityName, PostalCode, LastChanged, CreatedOn) 
VALUES (NULL, '$UnitNumber', '$StreetNumber', '$StreetName', '$CityName', '$PostalCode', current_timestamp(), current_timestamp())";
$conn->query($sql);

$sql = "SELECT AddressID from address ORDER BY AddressID DESC";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$AddressID = $row['AddressID'];

$sql = "INSERT INTO veterinarian (VetID, FullName, AddressID, YearofHire, LastChanged, CreatedOn) 
VALUES (NULL, '$FullName', '$AddressID', '$YearofHire', current_timestamp(), current_timestamp())";
$conn->query($sql);

header('location: veterinarian.php');
die;

CloseCon($conn);
?>
