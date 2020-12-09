<?php
include 'connect.php';
$conn = OpenCon();

$vetID = $_POST["vetID"];
$AddressID = $_POST["AddressID"]; 
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

$sql = "UPDATE address 
SET UnitNumber = '$UnitNumber', StreetNumber = '$StreetNumber', StreetName = '$StreetName', 
CityName = '$CityName', PostalCode = '$PostalCode', LastChanged = current_timestamp()
WHERE AddressID = '$AddressID'";
$conn->query($sql);

$sql = "UPDATE veterinarian 
SET FullName = '$FullName', YearofHire = '$YearofHire', LastChanged = current_timestamp()
WHERE OwnerID = '$vetID'";
$conn->query($sql);

header('location: veterinarianInfo.php?VetID=' . $vetID);
die;

CloseCon($conn);
?>
