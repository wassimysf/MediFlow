<!DOCTYPE html>
<html>
<head>
	<title>HIS Physician Dashboard</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="physiciandashboard.css">
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
				<li><a href="patientresults.php">Test Results</a></li>
				<li><a href="patientbillingload.php">billing</a></li>
				<li><a href="patientprofile.php">Medical Records</a></li>
				<li><a href="patientsettings.php">Settings</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
			</ul>
		</nav>
	</header>

	<section id="services">
		<h2></h2>
		<div class="container">
		  <div class="service-item" onclick="window.location.href='patientprofile.php';">
			<img src="img/laboratory.jpg" alt="Service 1">
			<h3>Medical Records</h3>
		  </div>
		  <div class="service-item" onclick="window.location.href='patientresults.php';">
			<img src="img/rad.jpg" alt="Service 2">
			<h3>My Results</h3>
		  </div>
		  <div class="service-item" onclick="window.location.href='patientbilling.php';">
			<img src="img/covid.jpg" alt="Service 3">
			<h3>Billing</h3>
		</div>
		<div class="service-item" onclick="window.location.href='patientsettings.php';">
			<img src="img/settings.jpg" alt="Service 3">
			<h3>Settings</h3>
		</div>
		</div>
	</section>
	
	</main>

	<!-- Footer section -->
	<footer>
		<p>&copy; 2023 Hospital Information System</p>
	</footer>

</body>
</html>