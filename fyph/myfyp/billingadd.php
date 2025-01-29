<?php
// Check if the form has been submitted
if(isset($_POST['submit'])){

    // Get form data
    $patientID = $_POST['patient-id'];
    $patientName = $_POST['patient-name'];
    $patientCoverage = $_POST['patient-coverage'];
    $billingType = $_POST['billing-type'];
    $priceNeeded = $_POST['price-needed'];

    // Validate form data
    if(empty($patientID) || empty($patientName) || empty($patientCoverage) || empty($billingType) || empty($priceNeeded)){
        echo "Please fill all fields";
        exit();
    }
    
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
    $sql = "INSERT INTO billing (patient_id, patient_name, patient_coverage, billing_type, price_needed) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $patientID, $patientName, $patientCoverage, $billingType, $priceNeeded);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>