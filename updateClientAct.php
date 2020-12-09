<?php
include 'connect.php';
$conn = OpenCon();

$clientID = $_POST["clientID"];
$AddressID = $_POST["AddressID"]; 
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

$sql = "UPDATE address 
SET UnitNumber = '$UnitNumber', StreetNumber = '$StreetNumber', StreetName = '$StreetName', 
CityName = '$CityName', PostalCode = '$PostalCode', LastChanged = current_timestamp()
WHERE AddressID = '$AddressID'";
$conn->query($sql);

$sql = "UPDATE petowner 
SET FullName = '$FullName', PhoneNumber = '$PhoneNumber', LastChanged = current_timestamp()
WHERE OwnerID = '$clientID'";
$conn->query($sql);

header('location: clientInfo.php?OwnerID=' . $clientID);
die;

CloseCon($conn);
?>
