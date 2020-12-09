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
                <h4>Animal Information</h4>
                <div class = "main-display">
	                <p>
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$petID = $_GET["AnimalID"];

							$sql = "SELECT animal.AnimalID, animal.Name, animal.Species, animal.Breed, animal.sex, animal.YearofBirth
							FROM animal WHERE animal.AnimalID = '$petID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<h1>Animal Name: " . $row["Name"] . "</h1>Species: " . $row['Species'] . "<br>"
									. "Breed: " . $row['Breed'] . "<br>Sex: " . $row['sex'] . "<br>Year of Birth: " .$row['YearofBirth'] . "<br><br>";  
								}
							}

							echo "<h2>Owners</h2>";

							$sql = "SELECT * FROM petowner JOIN animal
							ON animal.OwnerID_Primary = petowner.OwnerID OR animal.OwnerID_Secondary = petowner.OwnerID
							where animal.AnimalID='$petID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Owner Name: " . '<a href="clientInfo.php?OwnerID=' . $row["OwnerID"] . '">' . $row["FullName"] . "</a>" . "<br><br>";
								}
							}

							echo "<h2>Booked Appointments</h2>";

							$sql = "SELECT * FROM appointment WHERE appointment.animalID = '$petID';";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Appointment Id: " . '<a href="appointmentInfo.php?AppID=' . $row["AppointmentID"] . '">' . $row["AppointmentID"] . "</a><br>";
									echo "Start Time: " . $row['StartTime'] . "<br>End Time: " . $row['EndTime'] . "<br><br>";
								}
							}

							echo ' <div class="sidenav-right">
										<a href="dashboard.php">Main Dashboard</a> 
						                <a href="animal.php">Animal Dashboard</a>               
						                <a href="addAnimal.php">Add Animal </a> 						                 
						                <a href="updateAnimal.php?AnimalID=' . $petID . '"> Update Animal Details </a>      
						            </div>';		

							CloseCon($conn);
						?>	                   	
					</p>
				</div>     
            </div>
        </body> 
    </html>


