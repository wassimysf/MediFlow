
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
		<h1>Patient Radiology Record</h1>
		<nav>
			<ul>
				<li><a href="patientdashboard.php">Home</a></li>
				<li><a href="patientresults.php">Test Results</a></li>
				<li><a href="patientbilling.p">billing</a></li>
				<li><a href="patientsettings.php">Settings</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</header>
    <main>
		

<?php
// Start session
session_start();

// Check if patient is logged in
if (!isset($_SESSION['patient_id'])) {
  // Redirect to login page
  header("Location: login.php");
  exit();
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$sql = "SELECT * FROM radiology WHERE patient_id = '".$_SESSION['patient_id']."'";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Display table of radiology results
  echo "<table>
        <tr>
          <th>Radiology ID</th>
          <th>Patient ID</th>
          
          <th>Test Type</th>
          <th>Images</th>
          <th>Report</th>
          <th>Notes</th>
        </tr>";
  
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['radiology_id']."</td>
    <td>".$row['patient_id']."</td>
    <td>".$row['test_type']."</td>
    <td><img src='" . $row['image_data'] . "' width='150'></td>
    <td><a href='" . $row['report_data'] . "' target='_blank'>View Report</a></td>
    <td>".$row['notes']."</td>
  </tr>";

  }
  echo "</table>";
} else {
  // No radiology results found for patient
  echo "You have no radiology results.";
}

// Close database connection
$conn->close();
?>


	
</main>
</body>
</html>