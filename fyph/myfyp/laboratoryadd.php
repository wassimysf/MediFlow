<?php

// Replace these variables with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Extract form data
  $patient_id = $_POST["patient_id"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $wbc = $_POST["wbc"];
  $rbc = $_POST["rbc"];
  $hgb = $_POST["hgb"];
  $plt = $_POST["plt"];
  $alt_result = $_POST["alt_result"];
  $ast_result = $_POST["ast_result"];
  $alp_result = $_POST["alp_result"];
  $tbil_result = $_POST["tbil_result"];
  $bun_result = $_POST["bun_result"];
  $crea_result = $_POST["crea_result"];
  $ua_result = $_POST["ua_result"];
  
  // Prepare and bind SQL statement
  $stmt = $conn->prepare("INSERT INTO laboratory (patient_id, name, age, gender, wbc, rbc, hgb, plt, alt_result, ast_result, alp_result, tbil_result, bun_result, crea_result, ua_result) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
} else {
    $stmt->bind_param("ssisddddddddddd", $patient_id, $name, $age, $gender, $wbc, $rbc, $hgb, $plt, $alt_result, $ast_result, $alp_result, $tbil_result, $bun_result, $crea_result, $ua_result);
    // rest of the code
}
  $stmt->bind_param("ssisddddddddddd", $patient_id, $name, $age, $gender, $wbc, $rbc, $hgb, $plt, $alt_result, $ast_result, $alp_result, $tbil_result, $bun_result, $crea_result, $ua_result);
  
  // Execute SQL statement
  if ($stmt->execute() === TRUE) {
      echo "New record created successfully";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
      echo "Error: " . $stmt->error;
  }
  
  // Close statement and connection
  $stmt->close();
  $conn->close();
}