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

            <div class="main">            	
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Pet Owner Information</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$clientID = $_GET["OwnerID"];

							$sql = "SELECT petowner.FullName, petowner.PhoneNumber, address.UnitNumber, address.StreetNumber, address.StreetName, address.CityName, address.PostalCode 
							FROM petowner JOIN address ON petowner.AddressID = address.AddressID WHERE petowner.OwnerID = '$clientID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<h1>Owner Name: " . $row['FullName'] . "</h1>";
									echo "Phone: " . $row['PhoneNumber'] . "<br>"
									. "Address: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " .$row['CityName']; 
									
									if($row['UnitNumber'] != NULL)
										echo "<br>Unit Number: " . $row['UnitNumber'] . "<br>";
									else
										echo "<br>";
									echo "Postal Code: " . $row['PostalCode'] . "<br><br>";
								}
							}

							echo "<h2>Pets</h2>";

							$sql = "SELECT * FROM animal WHERE animal.OwnerID_Primary = '$clientID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Animal Name: " . '<a href="animalInfo.php?AnimalID=' . $row["AnimalID"] . '">' . $row["Name"] . "</a>" 
									. "<br>Species: " . $row['Species'] . "<br>Breed: " . $row['Breed'] . "<br><br>";
								}
							}

							$sql = "SELECT * FROM animal WHERE animal.OwnerID_Secondary = '$clientID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Animal Name: " . '<a href="animalInfo.php?AnimalID=' . $row["AnimalID"] . '">' . $row["Name"] . "</a>" 
									. "<br>Species: " . $row['Species'] . "<br>Breed: " . $row['Breed'] . "<br><br>";
								}
							}

							echo "<h2>Booked Appointments</h2>";

							$sql = "SELECT * FROM appointment WHERE appointment.ClientID = '$clientID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Appointment Id: " . '<a href="appointmentInfo.php?AppID=' . $row["AppointmentID"] . '">' . $row["AppointmentID"] . "</a><br>";
									echo "Start Time: " . $row['StartTime'] . "<br>End Time: " . $row['EndTime'] . "<br><br>";
								}
							}

							echo ' <div class="sidenav-right">
										<a href="dashboard.php">Main Dashboard</a> 
						                <a href="client.php">Pet Owner Dashboard</a>               
						                <a href="addClient.php">Add Pet Owner</a> 
						                <a href="updateClient.php?OwnerID=' . $clientID . '"> Update Pet Owner Details </a>      
						            </div>';					

							CloseCon($conn);
						?>
					</p>
				</div>     
            </div>
        </body> 
    </html>


