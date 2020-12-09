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
                <h4>Appointment Information</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$appID = $_GET["AppID"];

							$sql = "SELECT appointment.StartTime, appointment.AnimalID, appointment.EndTime, appointment.ClientID, animal.Name
								, veterinarian.FullName AS vFullName,  veterinarian.VetID, petowner.FullName AS pFullName
							FROM appointment
							JOIN Veterinarian
							ON Appointment.VetID = Veterinarian.VetID
							JOIN animal
							ON Appointment.AnimalID = Animal.AnimalID
							JOIN petowner
							ON Appointment.ClientID = Petowner.OwnerID
							WHERE Appointment.AppointmentID = '$appID';";
							$result = $conn->query($sql);


							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Veterinarian: " . '<a href="veterinarianInfo.php?VetID=' . $row["VetID"] . '">' . $row["vFullName"] . "</a><br>";
									echo "Client Name: " . '<a href="clientInfo.php?OwnerID=' . $row["ClientID"] . '">' . $row["pFullName"] . "</a><br>";
									echo "Animal Name: " . '<a href="animalInfo.php?AnimalID=' . $row["AnimalID"] . '">' . $row["Name"] . "</a><br><br>";
									echo "Start Time: " . $row['StartTime'] . "<br>End Time: " . $row['EndTime'] . "<br><br>";
								}
							}

							echo ' <div class="sidenav-right">	
										<a href="dashboard.php">Main Dashboard</a> 												
						                <a href="appointment.php">Appointments Dashboard</a>               
						                <a href="addAppointment.php">Add Appointment</a> 						            
						                <a href="updateAppointment.php?AppointmentID=' . $appID . '"> Update Appointment Details </a> 

						            </div>';	

							CloseCon($conn);
						?>	                   	
					</p>
				</div>     
            </div>
        </body> 
    </html>




