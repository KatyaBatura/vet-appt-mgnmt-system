<!DOCTYPE html>
<html>
	<head>
		<title>Veterinary Clinic Appointment Management System </title>		
		<link href="css/home.css" rel="stylesheet" type="text/css"  media="all" />
	</head>
	<body>
		<div class="topnav">
			<a href="index.html">HOME</a>
		    <a class="active" href="login.php">DASHBOARD LOGIN</a>
		    <a href="contact.html">CONTACT</a>
		    <a href="aboutUs.html">ABOUT</a>		      
		</div>

		<div class = "body-page-tabs">
		    <h1>Veterinary Clinic Appointment Management System</h1>
		    <p>		    		
				 		
		    </p>
		    <p>		    		
				 Please enter your details to access the dashboard
				 <br> </br>
				<?php
					include 'connect.php';
					$conn = OpenCon();
					
					echo '<form method="post" action="loginAction.php">';
						echo 'Username <br>  <br><input type="text" name="Username"><br> <br>';
						echo 'Password <br>  <br><input type="password" name="Password"><br> <br>';
					echo '<input type="submit">';
					CloseCon($conn);
				?>
				<br> </br>	
		    </p>
		</div>
	</body>
	<br> </br>
	<div class="footer">
			<p> <br> </br></p>
	</div>
</html>



		