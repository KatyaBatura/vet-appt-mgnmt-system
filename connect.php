<?php
function OpenCon(){

	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'appointmentsystem');
	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);	
	return $conn;
}

function CloseCon($conn){
	$conn -> close();
}
?>
