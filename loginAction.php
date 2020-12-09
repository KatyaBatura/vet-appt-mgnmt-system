<?php
session_start(); 

include 'connect.php';
$conn = OpenCon();

$Username=$_POST["Username"];
$Password=$_POST["Password"];


$sql = "SELECT * from user WHERE UserName = '$Username' && Password = '$Password'";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
	$_SESSION['user'] = $Username;
	header('location: dashboard.php');
	die;
} else {
	echo "Username or password is incorrect";
}
CloseCon($conn);
?>
