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

// Check if the edit button is clicked and retrieve the patient ID from the URL
if(isset($_POST['id'])) {
    $dsn = 'mysql:host=localhost;dbname=hsis';
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
    $pdo = new PDO($dsn, $username, $password, $options);
    $id = $_POST['id'];
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
    $sql = "UPDATE patients
        SET patient_name = ?,
            birthdate = ?,
            gender = ?,
            blood_type = ?,
            phone = ?,
            email = ?,
            emergency_contact = ?,
            coverage_info = ?,
            allergies = ?,
            medications = ?,
            medical_history = ?
        WHERE patient_id  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$fullname, $birthdate, $gender, $blood, $phone, $email, $emergency, $coverage, $allergies, $medications, $medicalhistory, $id]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: Invalid URL";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>