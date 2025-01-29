<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve values from the HTML form
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$blood = $_POST['blood'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$emergency = $_POST['emergency'];
$coverage = $_POST['patient-coverage'];
$allergies = $_POST['allergies'];
$medications = $_POST['medications'];
$medicalhistory = $_POST['medicalhistory'];

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to insert a new row into the table
$sql = "INSERT INTO patients (patient_name, birthdate, gender, blood_type, phone, email, emergency_contact, coverage_info, allergies, medications, medical_history) VALUES ('$fullname', '$birthdate', '$gender', '$blood', '$phone', '$email', '$emergency', '$coverage', '$allergies', '$medications', '$medicalhistory')";
if (mysqli_query($conn, $sql)) {
    $last_inserted_id = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO patientaccount (username ,password , patient_id ) VALUES ('$username', '$password' , '$last_inserted_id')";
    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } 
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
