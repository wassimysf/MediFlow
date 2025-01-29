<?php
// Check if the form has been submitted
if(isset($_POST['delete'])){

    // Get form data
    $billID = $_POST['billing-id'];
    $patientID = $_POST['patient-id'];

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
    $sql = "DELETE FROM billing WHERE billing_id = ? AND patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $billID, $patientID);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>