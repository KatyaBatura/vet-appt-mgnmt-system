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
                <h4>Pet Owner List</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$sql = "SELECT petowner.OwnerID, petowner.FullName, petowner.PhoneNumber, address.UnitNumber, address.StreetNumber, address.StreetName, address.CityName, address.PostalCode 
							FROM petowner JOIN address ON petowner.AddressID = address.AddressID

							";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Client: " . '<a href="clientInfo.php?OwnerID=' . $row["OwnerID"] . '">' . $row["FullName"] . "</a><br>Phone: " . $row['PhoneNumber'] . "<br>"
									. "Address: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " .$row['CityName']; 
									
									if($row['UnitNumber'] != NULL)
										echo "<br>UnitNumber: " . $row['UnitNumber'] . "<br>";
									else
										echo "<br>";
									echo "Postal Code: " . $row['PostalCode'] . "<br><br>";
								}
							}

							CloseCon($conn);
						?>
					</p>
				</div>     
            </div>
        </body> 
    </html>




