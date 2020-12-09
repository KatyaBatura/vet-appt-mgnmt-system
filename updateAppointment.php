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
                <h4>Update Appointment Details</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();
							
							$appointmentID = $_GET["AppointmentID"];
							
							$sql = "SELECT * FROM user";
							$sql2 = "SELECT * FROM veterinarian";
							$sql3 = "SELECT * FROM PetOwner";
							$sql4 = "SELECT * FROM animal";
							$sql5 = "SELECT appointment.SystemUserID, appointment.VetID, appointment.ClientID, appointment.AnimalID, appointment.StartTime, appointment.EndTime 
							FROM Appointment JOIN user ON user.UserID = appointment.SystemUserID JOIN veterinarian ON veterinarian.VetID = appointment.VetID JOIN petowner ON petowner.OwnerID = appointment.ClientID
							JOIN animal ON animal.AnimalID = appointment.AnimalID WHERE appointment.AppointmentID = '$appointmentID'";
							$result2 = $conn->query($sql5);
							$row2 = $result2->fetch_assoc();
							$Owner = $row2['ClientID'];
							$User = $row2['SystemUserID'];
							$Vet = $row2['VetID'];
							$Animal = $row2['AnimalID'];
							
							echo '<form method="post" action="UpdateAppointmentAct.php">';
							echo 'Appointment ID<br><input type="text" name="AppointmentID" value="' . $appointmentID . '" readonly> <br><br>';
							echo 'UserName<br><select name="User">';
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['UserID'] == $User) {
											echo '<option value="' . $row['UserID'] . '" selected>' . $row['UserName'] . '</option>';
										} else	{	
											echo '<option value="' . $row['UserID'] . '">' . $row['UserName'] . '</option>';
										}
									}
								}
							echo '</select> <br><br>';
							
							echo 'Veterinarian<br> <select name="Veterinarian">';
								$result = $conn->query($sql2);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['VetID'] == $Vet) {
											echo '<option value="' . $row['VetID'] . '" selected>' . $row['FullName'] . '</option>';
										} else	{	
											echo '<option value="' . $row['VetID'] . '">' . $row['FullName'] . '</option>';
									}
								}
								}
							echo '</select> <br><br>';
							
							echo 'Client Name<br> <select name="Client">';
								$result = $conn->query($sql3);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['OwnerID'] == $Owner) {
											echo '<option value="' . $row['OwnerID'] . '" selected>' . $row['FullName'] . '</option>';
										} else	{	
											echo '<option value="' . $row['OwnerID'] . '">' . $row['FullName'] . '</option>';
										}
									}
								}
							echo '</select> <br><br>';
							
							echo ' Animal Name<br> <select name="Animal">';
								$result = $conn->query($sql4);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['AnimalID'] == $Animal) {
											echo '<option value="' . $row['AnimalID'] . '" selected>' . $row['Name'] . '</option>';
										} else	{	
											echo '<option value="' . $row['AnimalID'] . '">' . $row['Name'] . '</option>';
										}
									}
								}
							echo '</select><br><br>';
							
							echo 'Starting Time<br><input type="datetime-local" name="StartTime" value="' . $row2["StartTime"] . '"><br><br> ';
							echo 'Ending Time<br><input type="datetime-local" name="EndTime" value="' . $row2["EndTime"] . '"> <br><br>';
							echo '<input type="submit">';
							CloseCon($conn);
						  ?>
					</p>
				</div>     
            </div>
        </body> 
    </html>




   
