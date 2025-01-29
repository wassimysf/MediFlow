
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

// Check if patient ID is set in session
if(isset($_SESSION['patient_id'])){

    // Get patient ID from session
    $patientID = $_SESSION['patient_id'];

    // Connect to the database
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
    $sql = "SELECT * FROM billing WHERE patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientID);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        // Display billing information for the patient
        // echo "<table>";
        // echo "<tr><th>Billing ID</th><th>Patient ID</th><th>Patient Name</th><th>Patient Coverage</th><th>Billing Type</th><th>Price Needed</th></tr>";

        while($row = $result->fetch_assoc()) {
                $billingID = $row["billing_id"];
                $patientID = $row["patient_id"];
                $patientName = $row["patient_name"];
                $patientCoverage = $row["patient_coverage"];
                $billingType = $row["billing_type"];
                $priceNeeded = $row["price_needed"];
                echo "<div class=\"content\">
                <div class=\"card-box\">
                    <div class=\"card\">
                        <h2>Billing Info</h2>
                        <ul>
                            <li>
                                <span class=\"label\"><strong>Billing ID:</strong></span>
                                <span class=\"value\">" . $billingID . "</span>
                            </li>
                            <li>
                                <span class=\"label\"><strong>Patient ID:</strong></span>
                                <span class=\"value\">" . $patientID . "</span>
                            </li>
                            <li>
                                <span class=\"label\"><strong>Patient Name:</strong></span>
                                <span class=\"value\">" . $patientName . "</span>
                            </li>
                            <li>
                                <span class=\"label\"><strong>Patient Coverage	Billing Type:</strong></span>
                                <span class=\"value\">" . $patientCoverage . "</span>
                            </li>
                            <li>
                                <span class=\"label\"><strong>Price Needed:</strong></span>
                                <span class=\"value\">" . $priceNeeded . "</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>";
            






            //echo "<tr><td>".$row["billing_id"]."</td><td>".$row["patient_id"]."</td><td>".$row["patient_name"]."</td><td>".$row["patient_coverage"]."</td><td>".$row["billing_type"]."</td><td>".$row["price_needed"]."</td></tr>";
        }

        //echo "</table>";

    } else {

        // No billing information found for the patient
        echo "No billing information found for this patient.";

    }

    // Close connection
    $stmt->close();
    $conn->close();

} else {

    // Patient ID not set in session
    echo "Patient ID not found in session.";

}
?>

	
</main>
</body>
</html>
