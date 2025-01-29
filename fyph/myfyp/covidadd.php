<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hsis";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the form data
  $patientID = $_POST["patient-id"];
  $patientName = $_POST["patient-name"];
  $testDate = $_POST["test-date"];
  $testResult = $_POST["test-result"];
  $testType = $_POST["test-type"];

  // Insert the data into the database
  $sql = "INSERT INTO covid (patient_id, patient_name, test_date, test_result, test_type)
          VALUES ('$patientID', '$patientName', '$testDate', '$testResult', '$testType')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>