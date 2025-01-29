
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>COVID Test Results Page</title>
    <style>
      header {
  background-color: #0072c6;
  color: #fff;
  display: flex;
  justify-content: space-between;
  padding: 10px 20px;
}

.logo {
  display: flex;
  align-items: center;
}

.logo img {
  height: 50px;
  margin-right: 10px;
}

nav ul {
  display: flex;
}

nav li {
  margin-left: 20px;
  list-style: none;
}

nav li:first-child {
  margin-left: 0;
}

nav a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
}

nav a:hover {
  text-decoration: underline;
}
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
      }
      h1 {
        color: #336699;
        font-size: 36px;
        margin: 0;
        padding: 20px 0;
        text-align: center;
      }

      h2 {
        color: #33683399;
        font-size: 20px;
        margin: 0;
        padding: 20px 0;
        text-align: center;
      }
      form {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 40px;
        margin: 0 auto;
        max-width: 500px;
        border-radius: 10px;
      }
      label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        color: #666;
      }
      select,
      input[type="file"],
      input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 20px;
      }
      input[type="submit"] {
        background-color: #336699;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
      }
      input[type="submit"]:hover {
        background-color: #23527c;
      }
      table {
  border-collapse: collapse;
  width: 100%;
  margin: 20px 0;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th, td {
  text-align: left;
  padding: 12px;
}

th {
  background-color: #336699;
  color: #fff;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #e6e6e6;
}
    </style>
  </head>
  <header>
		<div class="logo">
			<img src="logo.png" alt="Hospital logo">
			<h3>Hospital Information System</h3>
		</div>
		<nav>
			<ul>
			<li><a href="physiciandashboard.php">Home</a></li>
			</ul>
		</nav>
	</header>
  <body>
    <section id="covid-results">
      <h1>COVID Test Results Page</h1>
      <form action="covidadd.php" method="POST">
      <label for="patient-id">Patient ID:</label>
        <input type="text" id="patient-id" name="patient-id" required>
        <label for="patient-name">Patient Name:</label>
        <input type="text" id="patient-name" name="patient-name" required>
        <label for="test-date">Test Date:</label>
        <input type="text" id="test-date" name="test-date" placeholder="mm/dd/yyyy" required>
        <label for="test-result">Test Result:</label>
        <select id="test-result" name="test-result" required>
          <option value="" selected disabled>Select an option</option>
          <option value="positive">Positive</option>
          <option value="negative">Negative</option>
        </select>
        <label for="test-type">Test Type:</label>
        <select id="test-type" name="test-type" required>
          <option value="" selected disabled>Select an option</option>
          <option value="PCR">PCR</option>
          <option value="Antigen">Antigen</option>
          <option value="Antibody">Antibody</option>
        </select>
        <input type="submit" value="Submit">
      </form>
    </section>
    <h1>Patients Tests<h1>
<?php
    // Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select data from the covid_results table
$sql = "SELECT * FROM covid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output table header
  echo "<table><tr><th>Test ID</th><th>Patient ID</th><th>Patient Name</th><th>Test Date</th><th>Test Result</th><th>Test Type</th></tr>";
  // Output table rows
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["covid_id"]."</td><td>".$row["patient_id"]."</td><td>".$row["patient_name"]."</td><td>".$row["test_date"]."</td><td>".$row["test_result"]."</td><td>".$row["test_type"]."</td></tr>";
  }
  // Output table footer
  echo "</table>";
} else {
  echo "<h2>No results found<h2>";
}

$conn->close();
?>


    <section id="covid-results">
      <h1>Radiology Page</h1>
      <form action="coviddelete.php" method="POST">
        <label for="id">Test ID:</label>
        <input type="text" id="covid-id" name="covid-id" required>
        <input type="submit" name="delete" value="Delete">
      </form>
    </section>
  </body>
</html>