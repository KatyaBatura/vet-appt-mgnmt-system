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
                <h4>Veterinarian Information</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$vetID = $_GET["VetID"];

							$sql = "SELECT veterinarian.FullName, veterinarian.YearofHire, address.UnitNumber, address.StreetNumber, address.StreetName, address.CityName, address.PostalCode 
							FROM veterinarian JOIN address ON veterinarian.AddressID = address.AddressID WHERE veterinarian.VetID = '$vetID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<h1>Veterinarian Name: " . $row['FullName'] . "</h1>";
									echo "Address: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " .$row['CityName']; 
									
									if($row['UnitNumber'] != NULL)
										echo "<br>Unit Number: " . $row['UnitNumber'] . "<br>";
									else
										echo "<br>";
									echo "Postal Code: " . $row['PostalCode'] . "<br>";
									
									echo "Year of Hire: " . $row['YearofHire'] . "<br><br>";
								}
							}

							echo "<h2>Booked Appointments</h2>";

							$sql = "SELECT * FROM appointment WHERE appointment.VetID = '$vetID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Appointment Id: " . '<a href="appointmentInfo.php?AppID=' . $row["AppointmentID"] . '">' . $row["AppointmentID"] . "</a><br>";
									echo "Start Time: " . $row['StartTime'] . "<br>End Time: " . $row['EndTime'] . "<br><br>";
								}
							}
							echo '  <div class="sidenav-right">
										<a href="dashboard.php">Main Dashboard</a> 
						                <a href="veterinarian.php">Veterinarian Dashboard</a>               
						                <a href="addVeterinarian.php">Add Veterinarian</a>
						                <a href="updateVeterinarian.php?VetID=' . $vetID . '"> Update Veterinarian Details </a>      
						            </div>';	

							CloseCon($conn);
						?>
					</p>
				</div>     
            </div>
        </body> 
    </html>



