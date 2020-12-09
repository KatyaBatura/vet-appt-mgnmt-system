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
                <a href="animal.php">Animal Dashboard</a>               
                <a href="addAnimal.php">Add Animal </a>                  
            </div>
            <div class="main">
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Animal List</h4>
                <div class = "main-display">
	                <p> 
	                   	<?php
                            include 'connect.php';
                            $conn = OpenCon();

                            $sql = "SELECT animal.AnimalID, animal.Name, animal.Species, animal.Breed, animal.sex, animal.YearofBirth
                            FROM animal";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "Name: " . '<a href="animalInfo.php?AnimalID=' . $row["AnimalID"] . '">' . $row["Name"] . "</a><br>Species: " . $row['Species'] . "<br>"
                                    . "Breed: " . $row['Breed'] . "<br>Sex: " . $row['sex'] . "<br>Year of Birth: " .$row['YearofBirth'] . "<br><br>"; 
                                    
                                }
                            }

                            CloseCon($conn);
                        ?>
					</p>
				</div>     
            </div>
        </body> 
    </html>