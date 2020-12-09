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
                <h4>Add a new Appointment</h4>
                <div class = "main-display">
	                <p> 
	                	  <?php
								include 'connect.php';
								$conn = OpenCon();
								
								$sql = "SELECT * FROM user";
								$sql2 = "SELECT * FROM veterinarian";
								$sql3 = "SELECT * FROM petowner";
								$sql4 = "SELECT * FROM animal";
								
								echo '<form method="post" action="addAppointmentAct.php">';
								echo 'UserName<br><select name="User">';
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
									echo '<option value="' . $row['UserID'] . '">' . $row['UserName'] . '</option>';
										}
									}
								echo '</select><br><br> ';
								
								echo 'Veterinarian<br><select name="Veterinarian">';
									$result = $conn->query($sql2);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
									echo '<option value="' . $row['VetID'] . '">' . $row['FullName'] . '</option>';
										}
									}
								echo '</select> <br><br>';
								
								echo 'Client Name<br><select name="Client">';
									$result = $conn->query($sql3);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
									echo '<option value="' . $row['OwnerID'] . '">' . $row['FullName'] . '</option>';
										}
									}
								echo '</select> <br><br>';
								
								echo 'Animal Name<br><select name="Animal">';
									$result = $conn->query($sql4);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
									echo '<option value="' . $row['AnimalID'] . '">' . $row['Name'] . '</option>';
										}
									}
								echo '</select><br><br> ';
								echo ' Starting Time<br><input type="datetime-local" name="StartTime" value="YYYY-MM-DD 24:00:00"><br><br>';
								echo 'Ending Time<br><input type="datetime-local" name="EndTime" value="YYYY-MM-DD 24:00:00"><br><br> ';
								echo '<input type="submit">';
								CloseCon($conn);
							?>
					</p>
				</div>     
            </div>
        </body> 
    </html>


 
