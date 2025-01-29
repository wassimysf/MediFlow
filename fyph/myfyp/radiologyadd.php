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
  // retrieve form data
  $patient_id = $_POST['patient-id'];
  $radiology_test = $_POST['test-select'];
  $notes = $_POST['notes'];
  
  // file upload handling
  $image_file = $_FILES['image-upload']['name'];
  $image_temp = $_FILES['image-upload']['tmp_name'];
  $report_file = $_FILES['report-upload']['name'];
  $report_temp = $_FILES['report-upload']['tmp_name'];

  // move uploaded files to radiologyimg and radiologyreport folders
  $img_dir = "radiologyimg/";
  $report_dir = "radiologyreport/";
  move_uploaded_file($image_temp, $img_dir . $image_file);
  move_uploaded_file($report_temp, $report_dir . $report_file);

  // Insert the data into the database

$sql = "INSERT INTO radiology (patient_id, test_type, notes, image_data, report_data)
VALUES ('$patient_id', '$radiology_test', '$notes', '$img_dir$image_file', '$report_dir$report_file')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>