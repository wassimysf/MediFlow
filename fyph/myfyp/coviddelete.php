<?php
  // Database credentials
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hsis";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if form has been submitted
  if (isset($_POST["delete"])) {
    // Get patient ID from form submission
    $covid_id = $_POST["covid-id"];

    // SQL query to delete patient information
    $sql = "DELETE FROM covid WHERE covid_id = $covid_id";

    if ($conn->query($sql) === TRUE) {
      echo "Patient information deleted successfully";
    } else {
      echo "Error deleting patient information: " . $conn->error;
    }
  }

  $conn->close();
?>
