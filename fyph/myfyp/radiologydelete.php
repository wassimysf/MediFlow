<?php
// Get the radiology ID from the form
$radId = $_POST['rad-id'];

// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'hsis');

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Construct the DELETE query
$sql = "DELETE FROM radiology WHERE radiology_id = $radId";

// Execute the query and check if it was successful
if ($conn->query($sql) === TRUE) {
  echo "Radiology record with ID $radId was successfully deleted";
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>