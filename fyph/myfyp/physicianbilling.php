<!DOCTYPE html>
<html>
<head>
	<title>Billing System</title>
	<link rel="stylesheet" type="text/css" href="physicianbilling.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="logo.png" alt="Hospital logo">
			<h1>Hospital Information System</h1>
		</div>
		<nav>
		<ul>
		<li><a href="physiciandashboard.php">Home</a></li>
			<li>
				<a href="physicianpatients.php">Patients</a></li>
				<li><a href="laboratory.php">Laboratory</a></li>
				<li><a href="radiology.php">Radiology</a></li>
				<li><a href="covid.php">Covid</a></li>
				<li><a href="physiciansettings.php">Settings</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
	<h2>Billing System</h2>
	<form class="form" method="POST" action="billingadd.php">
		<label for="patient-name">Patient Full Name:</label>
		<input type="text" name="patient-name" id="patient-name" required>

	
		<label for="patient-id">Patient ID:</label>
		<input type="text" name="patient-id" id="patient-id" required>
		

	<label for="patient-coverage">Patient Coverage:</label>
	<select name="patient-coverage" id="patient-coverage" required>
		<option value="a">صندوق الضمان الاجتماعي</option>
		<option value="b">تأمين</option>
		<option value="d">تعاونية</option>
		<option value="e">وزارة الصحة</option>
		<option value="f">علي حساب السخصي</option>
	</select>

	<label for="billing-type">Billing Type:</label>
	<select name="billing-type" id="billing-type" required>
		<option value="a">Laboratory Service</option>
		<option value="b">Radiology Service</option>
		<option value="c">EMERGENGY Entry</option>
		<option value="d">Covid-19 Vaccine</option>
		<option value="e">Covid-19 Test</option>
		<option value="f">Normal Entry</option>
		<option value="g">Minor Operation</option>
	</select>
	
	<label for="price-needed">Price Needed (L.L):</label>
	<input type="number" name="price-needed" id="price-needed" required >
	
	<button type="submit" class="btn btn-primary" name="submit">Add</button>
	</form>
	<!-- <div id="total-div"></div> -->
	<p id="customerPrice"></p>
	<p id="discountCoverage"></p>

	  <?php

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hsis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "SELECT * FROM billing";

    // Execute SQL statement
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output table headers
        echo "<table><tr><th>Billing ID</th><th>Patient ID</th><th>Patient Name</th><th>Patient Coverage</th><th>Billing Type</th><th>Price Needed</th></tr>";

        // Output table rows
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["billing_id"] . "</td><td>" . $row["patient_id"] . "</td><td>" . $row["patient_name"] . "</td><td>" . $row["patient_coverage"] . "</td><td>" . $row["billing_type"] . "</td><td>" . $row["price_needed"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No billing records found.";
    }

    // Close connection
    $conn->close();

?>

<section id="radiology">
		<h2>Delete bill</h2>
		<form action="billingdelete.php" method="POST">
		  <label for="id">Billing ID:</label>
		  <input type="text" id="rad-id" name="rad-id" required>
		  <label for="patient-id">Patient ID:</label>
		  <input type="text" name="patient-id" id="patient-id" required>
		  <button type="delete" class="btn btn-primary" name="dekete">Delete</button>
		</form>
	  </section>
<script src="physicianbilling.js"></script>
</main>
</body>
</html>