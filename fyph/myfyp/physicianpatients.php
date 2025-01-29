<?php
  $format = 'Y-m-d H:i:s';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HIS Physician Dashboard</title>
	
	<link rel="stylesheet" type="text/css" href="physicianpatients.css">
    
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
				<li><a href="radiology.php">Radiology</a></li>
				<li><a href="covid.php">Covid</a></li>
				<li><a href="physicianbilling.php">Billing</a></li>
				<li><a href="physiciansettings.php">Settings</a></li>
				<li><a href="#">Logout</a></li>
			</ul>
		</nav>
	</header>

	<!-- Main section -->
	<main>

    <section class="patients">
      <h2>Registered Patients</h2>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Blood Type</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "hsis");
    
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
    
            // Retrieve patient information from database
            $sql = "SELECT * FROM patients WHERE deleted = 0;";
            $result = mysqli_query($conn, $sql);
    
            // Display patient information in table
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['patient_id'];
                $name = $row['patient_name'];
                $gender = $row['gender'];
                $BT = $row['blood_type'];
                $phone = $row['phone'];
                $email = $row['email'];
                $emergency = $row['emergency_contact'];
                $ci = $row['coverage_info'];
                $allergies = $row['allergies'];
                $medications = $row['medications'];
                $medical_history = $row['medical_history'];
                echo "<tr>";
                echo "<td>" . $row["patient_id"] . "</td>";
                echo "<td>" . $row["patient_name"] . "</td>";
                // Calculate age based on birthdate
                $birthdate = new DateTime($row["birthdate"]);
                $today = new DateTime();
                $age = $birthdate->diff($today)->y;
                $birthdate2 = $birthdate->format('Y-m-d');;
                echo "<td>" . $age . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["blood_type"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>";
                echo "<button id='profile'>Profile</button>";
                echo "<button id='edit' onclick=\"Edit('$id', '$name', '$birthdate2', '$gender', '$BT', '$phone', '$email', '$emergency', '$ci', '$allergies', '$medications', '$medical_history');\">Edit</button>";
                echo "<button id='delete' onclick=\"location.href='deletepatient.php?id=$id'\">Delete</button>";

                echo "</td>";
                echo "</tr>";
              }
            }
    
            // Close database connection
            mysqli_close($conn);
          ?>
        </tbody>
          </table>

    </section>
    <h2>Patient Information</h2>
              <section>
                <h2>Patient Information</h2>
                <form action="patientadd.php" method="POST">
                <label for="username">UserName:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password"><br><br>


                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname"><br><br>
                    
                <label for="birthdate">Date of Birth:</label>
                <input type="date" id="birthdate" name="birthdate"><br><br>
                    
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select><br><br>
                    
                <label for="blood">Blood type:</label>
                <select id="blood" name="blood">
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select><br><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone"><br><br>
                    
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email"><br><br>

                <label for="emergency">Emergency Contact Information:</label>
                <textarea id="emergency" name="emergency"></textarea><br><br>
                    
                <label for="patient-coverage">Health Insurance Information:</label>
                <select id="patient-coverage" name="patient-coverage">
                    <option value="a">صندوق الضمان الاجتماعي</option>
                    <option value="b">تأمين</option>
                    <option value="d">تعاونية</option>
                    <option value="e">وزارة الصحة</option>
                    <option value="f">علي حساب السخصي</option>
                </select><br><br>

                <label for="allergies">Allergies:</label>
                <textarea id="allergies" name="allergies"></textarea><br><br>

                <label for="medications">Current Medications:</label>
                <textarea id="medications" name="medications"></textarea><br><br>
                    
                <label for="medicalhistory">Medical History:</label>
                <textarea id="medicalhistory" name="medicalhistory"></textarea><br><br>
                <button id="profile" class="add-patient-button">Add New Patient</button>
          </form>
              </section>
            
</section>

<h2>Update Patient Information</h2>
              <section>    <h2>Patient Information</h2>
    <form action="updatepatient.php" method="POST" id="update">
      <input type="text" id="id" hidden name="id" value="">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value=""><br><br>

        <label for="birthdate">Date of Birth:</label>
        <input type="date" id="birthdate" name="birthdate" value=""><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <?php $gender2 = $gender??' ';?>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="blood">Blood type:</label>
        <select id="blood" name="blood">
        
            <option value="AB+" >AB+</option>
            <option value="AB-" >AB-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+" >B+</option>
            <option value="B-" >B-</option>
            <option value="O+" >O+</option>
            <option value="O-" >O-</option>
        /select><br><br>
<label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" value=""><br><br>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" value=""><br><br>

    <label for="emergency">Emergency Contact Information:</label>
    <textarea id="emergency" name="emergency"></textarea><br><br>

    <label for="patient-coverage">Health Insurance Information:</label>
    <select id="patient-coverage" name="patient-coverage">

        <option value="a" >صندوق الضمان الاجتماعي</option>
        <option value="b" >تأمين</option>
        <option value="d" >تعاونية</option>
        <option value="e" >وزارة الصحة</option>
        <option value="f" >علي حساب السخصي</option>
    </select><br><br>

    <label for="allergies">Allergies:</label>
    <textarea id="allergies" name="allergies"></textarea><br><br>

    <label for="medications">Current Medications:</label>
    <textarea id="medications" name="medications"></textarea><br><br>

    <label for="medicalhistory">Medical History:</label>
    <textarea id="medicalhistory" name="medicalhistory"></textarea><br><br>

    <button id="profile" class="add-patient-button" type="submit">Update</button>
</form>

              </section>
	</main>

	<!-- Footer section -->
	<footer>
		<p>&copy; 2023 Hospital Information System</p>
	</footer>
            <script>
                function Edit(patient_id , patient_name , birthdate , gender , blood_type , phone , email , emergency_contact , coverage_info , allergies , medications , medical_history) {
                  var form = document.getElementById("update");
                  form.elements['fullname'].value = patient_name;
                  form.elements['birthdate'].value = birthdate;
                  form.elements['gender'].value = gender;
                  form.elements['blood'].value = blood_type;
                  form.elements['phone'].value = phone;
                  form.elements['email'].value = email;
                  form.elements['emergency'].value = emergency_contact;
                  form.elements['patient-coverage'].value = coverage_info;
                  
                  form.elements['allergies'].value = allergies;
                  form.elements['medications'].value = medications;
                  form.elements['medicalhistory'].value = medical_history;
                  form.elements['id'].value = patient_id;
                  console.log(form.elements['id'].value);
                }
            </script>
</body>
</html>