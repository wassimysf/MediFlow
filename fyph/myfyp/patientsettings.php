<?php
session_start();
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
$id =  $_SESSION['patient_id'];
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
    // Check if the old password is correct and update the user's password in the database
    $username = $_SESSION['username']; // Replace with the user's username
    $query = "SELECT password FROM patientaccount WHERE username='$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      $password_hash = $row['password'];

      
        // Passwords match, update the user's password in the database
        
        $update_query = "UPDATE patientaccount SET password='$new_password' WHERE username='$username'";
        $mysqli->query($update_query);
        $success = 'Password changed successfully.';
      
    } else {
      $error = 'User not found.';
    }
  }


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="patientsettings.css">
	<title>Settings</title>
</head>
<body>
	<header>
		<h1>Settings</h1>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Appointments</a></li>
				<li><a href="#">Medical Records</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>Settings</h1>
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
			<fieldset>
				<?php
					 $query = "SELECT * FROM patients WHERE patient_id ='$id'";
					 $result = $mysqli->query($query);
					 if ($result === false) {
						die("Error executing query: " . $mysqli->error);
					}
					 $row = $result->fetch_assoc();
					 $email = $row['email'];
					 $phone = $row['phone'];
					 $emergency_contact = $row['emergency_contact'];
					 $allergies = $row['allergies'];
					 $medications = $row['medications'];
					 $medical_history = $row['medical_history'];




					 
					 $name = $row['patient_name'];
					 $gender = $row['gender'];
					 $BT = $row['blood_type'];
					 $birthdate = new DateTime($row["birthdate"]);
					 //$birthdate = $birthdate->format('Y-M-D');
					 $formatted_date = date('Y-m-d', strtotime($row["birthdate"]));
					 $ci = $row['coverage_info'];
					 
					 
					
				?>
				<form action="updatepatient.php" method="POST">
				<legend>Contact Information</legend>
				<input type="text" value="<?php echo $id;?>"  name="id" style="display: none;">
				<input type="text" value="<?php echo $name;?>" style="display: none;" name="fullname">
				<input type="text" value="<?php echo $BT;?>" style="display: none;" name="blood">
				<input type="text" value="<?php echo $gender;?>" style="display: none;" name="gender">
				<input type="date" value="<?php echo $formatted_date;?>" style="display: none;" name="birthdate">
				<input type="text" value="<?php echo $ci;?>" style="display: none;" name="patient-coverage">
				<label for="email">Email Address:</label>
				<input type="email" id="email" name="email" value="<?php echo $email; ?>">
				<label for="phone">Phone Number:</label>
				<input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
				<label for="EmergencyContact">Emergency Contact:</label>
				<input type="EmergencyContact" id="phone" name="emergency" value="<?php echo $emergency_contact; ?>">
				<label for="allerigies">allerigies:</label>
				<textarea id="allerigies" name="allergies"><?php echo $allergies; ?></textarea>
<label for="medications">medications:</label>
				<textarea id="medications" name="medications"><?php echo $medications; ?></textarea>
<label for="medical_history">medical_history:</label>
				<textarea id="medical_history" name="medicalhistory"><?php echo $medical_history; ?></textarea>
				<input type="submit" value="Save Changes">
				</form>
			</fieldset>
		</form>
	</main>
</body>
</html>