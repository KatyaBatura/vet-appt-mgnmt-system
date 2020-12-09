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
                <h4>Veterinarian List</h4>
                <div class = "main-display">
	                <p> 
	                	<?php
							include 'connect.php';
							$conn = OpenCon();

							$sql = "SELECT veterinarian.VetID, veterinarian.FullName 
							FROM veterinarian";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "Veterinarian: " . '<a href="veterinarianInfo.php?VetID=' . $row["VetID"] . '">' . $row["FullName"] . "</a><br><br>";
								}
							}

							CloseCon($conn);
						?>	                   	
					</p>
				</div>     
            </div>
        </body> 
    </html>




