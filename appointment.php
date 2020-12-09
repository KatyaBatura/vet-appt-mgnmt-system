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
                <a href="appointment.php">Appointments Dashboard</a>               
                <a href="addAppointment.php">Add Appointment</a>                  
            </div>
            <div class="main">
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Appointment List</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$sql = "SELECT appointment.AppointmentID, appointment.StartTime, appointment.EndTime, animal.Name, veterinarian.FullName
							FROM appointment
							JOIN Veterinarian
							ON Appointment.VetID = Veterinarian.VetID
							JOIN animal
							ON Appointment.AnimalID = animal.AnimalID;";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Appointment ID: " . '<a href="appointmentInfo.php?AppID=' . $row["AppointmentID"] . '">' . $row["AppointmentID"] . "</a><br>Veterinarian: " 
									. $row['FullName'] . "<br>"
									. "Start Time: " . $row['StartTime'] . "<br>End Time " . $row['EndTime'] . "<br><br>"; 
								}
							}

							CloseCon($conn);
						?>
					</p>
				</div>     
            </div>
        </body> 
    </html>



