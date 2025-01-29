<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hsis';

// Connect to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}
$id =  $_SESSION['patient_id'];
$query = "SELECT * FROM patients WHERE patient_id ='$id'";
					 $result = $mysqli->query($query);
					 if ($result === false) {
						die("Error executing query: " . $mysqli->error);
					}
					 $row = $result->fetch_assoc();
					 $email = $row['email'];
					 $phone = $row['phone'];
					 $emergency_contact = $row['emergency_contact'];
					 $allergies = $row['allergies'];
					 $medications = $row['medications'];
					 $medical_history = $row['medical_history'];




					 
					 $name = $row['patient_name'];
					 $gender = $row['gender'];
					 $BT = $row['blood_type'];
					 $birthdate = new DateTime($row["birthdate"]);
					 $birthdate = $birthdate->format('Y-M-D');
					
					 $ci = $row['coverage_info'];
					 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="patientprofile.css">
	<title>Patient Medical Record</title>
</head>
<body>
	<header>
		<h1>Patient Medical Record</h1>
		<nav>
			<ul>
				<li><a href="patientdashboard.php">Home</a></li>
				<li><a href="patientresults.php">Test Results</a></li>
				<li><a href="patientbillingload.php">billing</a></li>
				<li><a href="patientsettings.php">Settings</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div class="content">
			<div class="card-box">
				<div class="card">
					<h2>Medical Record Details</h2>
					<!-- <div class="card-image">
						<img src="https://example.com/profile.jpg" alt="Profile picture">
						<button class="edit-button" title="Edit Image">&#9998;</button>
					</div> -->
					<ul>
						<li>
							<span class="label"><strong>Full Name:</strong></span>
							<span class="value"><?php  $name??'a';?></span>
						</li>
						<li>
							<span class="label"><strong>Date of Birth:</strong></span>
							<span class="value"><?php echo $birthdate;?></span>
						</li>
						<li>
							<span class="label"><strong>Gender:</strong></span>
							<span class="value"><?php echo $gender;?></span>
						</li>
						<li>
							<span class="label"><strong>Blood Type:</strong></span>
							<span class="value"><?php echo $BT;?></span>
						</li>
						<li>
							<span class="label"><strong>Phone number:</strong></span>
							<span class="value"><?php echo $phone;?></span>
						</li>
						<li>
							<span class="label"><strong>Email address:</strong></span>
							<span class="value"><?php echo $email;?></span>
						</li>
						<li>
							<span class="label"><strong>Emergency Contact:</strong></span>
							<span class="value"><?php echo $emergency_contact;?></span>
						</li>
						<li>
							<span class="label"><strong>Health Insurance:</strong></span>
							<span class="value"><?php echo $ci;?></span>
						</li>
						<li>
							<span class="label"><strong>Allergies:</strong></span>
							<span class="value"><?php echo $allergies;?></span>
						</li>
						<li>
							<span class="label"><strong>Medications:</strong></span>
							<span class="value"><?php echo $medications;?></span>
						</li>
						<li>
							<span class="label"><strong>Medical History:</strong></span>
							<span class="value"><?php echo $medical_history;?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		

    </div>

		
    </main>
</body>
</html>