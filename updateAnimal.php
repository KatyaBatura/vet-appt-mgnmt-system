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
                <h4>Update Animal Details</h4>
                <div class = "main-display">
	                <p> 
	                   	<?php
							include 'connect.php';
							$conn = OpenCon();

							$AnimalID = $_GET["AnimalID"];
							$sql = "SELECT * FROM animal WHERE '$AnimalID' = animal.animalID";
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
							$PrimaryID = $row['OwnerID_Primary'];
							$SecondaryID = $row['OwnerID_Secondary'];

							$sql = "SELECT * FROM petowner";
								
							echo '<form method="post" action="updateAnimalAct.php">';

							echo 'Animal ID<br><input type="text" name="AnimalID" value="' . $AnimalID . '" readonly> <br> <br>';
								echo 'Name<br><input type="text" name="Name"  value="' . $row['Name'] . '"> <br> <br>';
								echo 'Species<br><input type="text" name="Species"  value="' . $row['Species'] . '"> <br> <br>';
								echo 'Breed<br><input type="text" name="Breed"  value="' . $row['Breed'] . '"> <br> <br>';
								echo 'Sex<br><input type="text" name="Sex" value="' . $row['Sex'] . '"> <br> <br>';
								echo 'Year of Birth<br><input type="text" name="YearofBirth" value="' . $row['YearofBirth'] . '"> <br> <br>';
								echo 'Primary Owner<br><select name="Primary"><br> <br>';
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											if($row['OwnerID'] == $PrimaryID) {
												echo '<option value="' . $row['OwnerID'] . '" selected>' . $row['FullName'] . '</option>';
											} else	{	
												echo '<option value="' . $row['OwnerID'] . '">' . $row['FullName'] . '</option>';
											}
										}
									}
								echo '</select> <br> <br>';
								
								echo ' Secondary Owner<br> <select name="Secondary">';
									echo '<option value="">--None--</option>';
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											while($row = $result->fetch_assoc()) {
											if($row['OwnerID'] == $SecondaryID) {
												echo '<option value="' . $row['OwnerID'] . '" selected>' . $row['FullName'] . '</option>';
											} else	{	
												echo '<option value="' . $row['OwnerID'] . '">' . $row['FullName'] . '</option>';
											}
										}
										}
									}
								echo '</select><br> <br>';
								echo '<input type="submit">';
							echo '</form>';
						?>
					</p>
				</div>     
            </div>
        </body> 
    </html>



