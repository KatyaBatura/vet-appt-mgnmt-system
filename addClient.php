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
                <a href="client.php">Pet Owner Dashboard</a>               
                <a href="addClient.php">Add Pet Owner</a>                  
            </div>
            <div class="main">
                <h3>Veterinary Clinic Appointment Management System</h3>
                <h4>Add a Pet Owner</h4>
                <div class = "main-display">
	                <p> 
	                	<form method="post" action="addClientAct.php">
							Name <br> <input type="text" name="FullName"><br><br>
							Phone Number<br><input type="text" name="PhoneNumber"> <br><br>
							Street Number<br><input type="text" name="StreetNumber"> <br><br>
							Street Name<br><input type="text" name="StreetName"> <br><br> 
							Unit Number<br><input type="text" name="UnitNumber" value=""> <br><br>
							City<br><input type="text" name="City"> <br><br>
							Postal Code<br><input type="text" name="PostalCode"> <br><br>
							<input type="submit">
						</form>
					</p>
				</div>     
            </div>
        </body> 
    </html>






