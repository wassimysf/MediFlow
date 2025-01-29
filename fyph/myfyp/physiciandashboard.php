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
			<li><a href="physicianpatients.php">Patients</a></li>
				<li><a href="laboratory.php">Laboratory</a></li>
				<li><a href="radiology.php">Radiology</a></li>
				<li><a href="covid.php">Covid</a></li>
				<li><a href="physicianbilling.php">Billing</a></li>
				<li><a href="physiciansettings.php">Settings</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</header>

	<section id="services">
		<h2></h2>
		<div class="container">
		  <div class="service-item" onclick="window.location.href='laboratory.php';">
			<img src="img/laboratory.jpg" alt="Service 1">
			<h3>Laboratory</h3>
		  </div>
		  <div class="service-item" onclick="window.location.href='radiology.php';">
			<img src="img/rad.jpg" alt="Service 2">
			<h3>Radiology</h3>
		  </div>
		  <div class="service-item" onclick="window.location.href='covid.php';">
			<img src="img/covid.jpg" alt="Service 3">
			<h3>Covid</h3>
		</div>
		<div class="service-item" onclick="window.location.href='physicianbilling.php';">
			<img src="img/billing.jpg" alt="Service 3">
			<h3>Billing</h3>
		</div>
		<div class="service-item" onclick="window.location.href='physiciansettings.php';">
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