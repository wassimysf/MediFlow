<?php
  // Replace <your-database-name>, <your-username>, and <your-password> with your database credentials
  $conn = new mysqli("localhost", "<your-username>", "<your-password>", "<your-database-name>");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if the patient_id parameter is set
  if (isset($_POST["patient_id"])) {
    $patientId = $_POST["patient_id"];

    // Execute a DELETE statement to remove the patient's information from the database
    $sql = "DELETE FROM patients WHERE patient_id = " . $patientId;
    if ($conn->query($sql) === TRUE) {
      echo "Patient deleted successfully.";
    } else {
      echo "Error deleting patient: " . $conn->error;
    }
  } else {
    echo "No patient_id specified.";
  }

  $conn->close();
?>