<?php
// Start session
session_start();

// Check if patient ID is set in session
if(isset($_SESSION['username'])){

    // Get patient ID from session
    $patientID = $_SESSION['username'];

}$patientID = $_SESSION['username'];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hsis';

// Connect to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $old_password = $_POST['old-password'];
  $new_password = $_POST['new-password'];
  $confirm_password = $_POST['confirm-password'];

  // Validate the form data
  if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
    $error = 'Please fill out all fields.';
  } elseif ($new_password !== $confirm_password) {
    $error = 'New password and confirm password do not match.';
  } else {
    
    $query = "SELECT password FROM physicianaccount WHERE username='$patientID'";
    $result = $mysqli->query($query);

    
      
        $update_query = "UPDATE physicianaccount SET password='$new_password' WHERE username='$patientID'";
        $mysqli->query($update_query);
        $success = 'Password changed successfully.';
      
  }

  $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HIS Physician Dashboard</title>
	
	<link rel="stylesheet" type="text/css" href="physiciansettings.css">
    
</head>
<body>
	<!-- Header section -->
	<header>
		<div class="logo">
			<img src="logo.png" alt="Hospital logo">
			<h1>Hospital Information System</h1>
		</div>
		<nav>
    <ul>
    <li><a href="physiciandashboard.php">Home</a></li>
			<li><a href="physicianpatients.php">Patients</a></li>
				<li><a href="laboratory.php">Laboratory</a></li>
				<li><a href="radiology.php">Radiology</a></li>
				<li><a href="covid.php">Covid</a></li>
				<li><a href="physicianbilling.php">Billing</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>

  <?php if (isset($success)): ?>
    <p><?php echo $success; ?></p>
  <?php endif; ?>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <fieldset>
      <legend>Change Password</legend>
      <label for="old-password">Old Password:</label>
      <input type="password" id="old-password" name="old-password">
      <label for="new-password">New Password:</label>
      <input type="password" id="new-password" name="new-password">
      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password">
      <input type="submit" value="Change Password">
    </fieldset>
  </form>
</body>
</html>