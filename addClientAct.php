<?php
include 'connect.php';
$conn = OpenCon();

$FullName=$_POST["FullName"];
$PhoneNumber=$_POST["PhoneNumber"];
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

$sql = "INSERT INTO petowner (OwnerID, FullName, AddressID, PhoneNumber, LastChanged, CreatedOn) 
VALUES (NULL, '$FullName', '$AddressID', '$PhoneNumber', current_timestamp(), current_timestamp())";
$conn->query($sql);

header('location: client.php');
die;

CloseCon($conn);
?>
