<!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="CSS/portal.css" rel="stylesheet" type="text/css" >
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
                <a href="client.php">Pet Owner Dashboard</a>               
                <a href="addClient.php">Add Pet Owner</a>                  
            </div>
            <div class="main">
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Update Pet Owner Details </h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$clientID = $_GET["OwnerID"];

							$sql = "SELECT petowner.FullName, petowner.PhoneNumber, address.UnitNumber, address.AddressID, address.StreetNumber, address.StreetName, address.CityName, address.PostalCode 
							FROM petowner JOIN address ON petowner.AddressID = address.AddressID WHERE petowner.OwnerID = '$clientID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								echo "<h3>Owner Name: " . $row['FullName'] . "</h3>";
								
								echo '<form method="post" action="updateClientAct.php">';
									echo 'Client ID<br> <input type="text" name="clientID" value="' . $clientID . '" readonly><br> <br>';
									echo ' Address ID<br><input type="text" name="AddressID" value="' . $row['AddressID'] . '" readonly><br> <br>';
									echo 'Name<br><input type="text" name="FullName" value="' . $row['FullName'] . '"> <br> <br>';
									echo 'Phone Number<br><input type="text" name="PhoneNumber" value="' . $row['PhoneNumber'] . '">  <br> <br>';
									echo ' Street Number<br><input type="text" name="StreetNumber" value="' . $row['StreetNumber'] . '"> <br> <br>';
									echo 'Street Name<br><input type="text" name="StreetName" value="' . $row['StreetName'] . '">  <br> <br>';
									echo 'Unit Number<br> <input type="text" name="UnitNumber" value="' . $row['UnitNumber'] . '"> <br> <br>';
									echo 'City<br> <input type="text" name="City" value="' . $row['CityName'] . '">  <br> <br>';
									echo 'Postal Code<br><input type="text" name="PostalCode" value="' . $row['PostalCode'] . '">  <br> <br>';
								echo '<input type="submit">';
								}
							?>
							</form>
					</p>
				</div>     
            </div>
        </body> 
    </html>




