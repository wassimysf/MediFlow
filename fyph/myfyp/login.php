<?php
session_start(); // Start session
session_unset();

// destroy the session
session_destroy();

// start a new session
session_start();
// Define database connection variables
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

if(isset($_POST['submit'])) {
    $username1 = $_POST['username'];
    $password = $_POST['password'];

    // Check if user is a patient
    $query = "SELECT * FROM patientaccount WHERE username='$username1' AND password='$password' AND deleted ='0';";
    $result = mysqli_query($conn, $query);
    if($result === false) {
        echo "Error executing query: " . mysqli_error($conn);
    } else {
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['patient_id'] = $row['patient_id'];
        $_SESSION['username'] = $row['username']; 
        header("Location: patientdashboard.php"); // Redirect to patient dashboard page
    } else {
        // Check if user is a physician
        $query = "SELECT * FROM physicianaccount WHERE username='$username1' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username']; // Set user ID as session variable
            header("Location: physiciandashboard.php"); // Redirect to patient dashboard page
        } else {
            echo "Invalid username or password.";
        }
    }
}
}
?>