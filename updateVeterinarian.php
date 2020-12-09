<!DOCTYPE html>
    <html>
       <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="CSS/portal.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <div class="sidenav">
                <a href= "./">Home</a>
                <a href="animal.php">Animal Information</a>
                <a href="veterinarian.php">Veterinarian Information</a>  
                <a href="appointment.php">Appointment Information</a> 
                <a href="client.php">Pet Owner Information</a> 
                <a href="logoutAct.php">Log Out</a> 
            </div>
             <div class="sidenav-right">
             	<a href="dashboard.php">Main Dashboard</a> 
                <a href="veterinarian.php">Veterinarian Dashboard</a>               
                <a href="addVeterinarian.php">Add Veterinarian</a>                  
            </div>
            <div class="main">
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Update Veterinarian Details</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$vetID = $_GET["VetID"];

							$sql = "SELECT veterinarian.FullName, veterinarian.YearofHire, address.UnitNumber, address.AddressID, address.StreetNumber, address.StreetName, address.CityName, address.PostalCode 
							FROM veterinarian JOIN address ON veterinarian.AddressID = address.AddressID WHERE veterinarian.VetID = '$vetID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								echo "<h1>Owner Name: " . $row['FullName'] . "</h1>";

								
								echo '<form method="post" action="updateVeterinarianAct.php">';
									echo 'Client ID<br><input type="text" name="vetID" value="' . $vetID . '" readonly> <br><br>';
									echo 'Address ID<br><input type="text" name="AddressID" value="' . $row['AddressID'] . '" readonly> <br><br>';
									echo 'Name<br><input type="text" name="FullName" value="' . $row['FullName'] . '"> <br><br>';
									echo 'Phone Number<br><input type="text" name="YearofHire" value="' . $row['YearofHire'] . '"> <br><br>';
									echo 'Street Number<br><input type="text" name="StreetNumber" value="' . $row['StreetNumber'] . '"> <br><br>';
									echo 'Street Name<br><input type="text" name="StreetName" value="' . $row['StreetName'] . '"> <br><br>';
									echo 'Unit Number<br><input type="text" name="UnitNumber" value="' . $row['UnitNumber'] . '"> <br><br>';
									echo 'City<br><input type="text" name="City" value="' . $row['CityName'] . '"> <br><br>';
									echo 'Postal Code<br><input type="text" name="PostalCode" value="' . $row['PostalCode'] . '"> <br><br>';
								echo '<input type="submit">';

							}

						?>            	
					</p>
				</div>     
            </div>
        </body> 
    </html>





