<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>See Results</title>
    <link rel="stylesheet" href="patientresults.css">
    <script type="text/javascript">
      function showSection() {
        document.getElementById('patient-info').style.display = 'block';
      }
      function hideSection() {
        document.getElementById('patient-info').style.display = 'none';
      }
    </script>
</head>
<body>
	<header>
		<h1>See Results</h1>
		<nav>
			<ul>
				<li><a href="patientdashboard.php">Home</a></li>
			</ul>
		</nav>
	</header>
    <main>
      <section id="results">
        <div class="container">
          <div class="results-item" onclick="showSection()">
            <a href="laboratory.php?userType=patient"><img src="img/plaboratory.jpg"></a>
            <a href="#"><h3>Laboratory</h3></a>
          </div>
          <div class="results-item" onclick="showSection()">
            <a href="patientradiologyload.php"><img src="img/pradiology.jpg"></a>
            <a href="#"><h3>Radiology</h3></a>
          </div>
          <div class="results-item" onclick="showSection()">
            <a href="patientcovidload.php"><img src="img/pcovid.jpg"></a>
            <a href="#"><h3>Covid</h3></a>
          </div>
        </div>
      </section>

      <div id="covid" style="display:none;">
        <button onclick="hideSection()">Close</button>
		<?php
  // Start session
  session_start();

  // Check if user is logged in
  if (!isset($_SESSION["patient_id"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
  }

  // Database credentials
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

  // Get patient ID from session
  $patient_id = $_SESSION["patient_id"];

  // Prepare and bind statement
  $stmt = $conn->prepare("SELECT patient_name, test_date, test_result, test_type FROM patients WHERE patient_id = ?");
  $stmt->bind_param("s", $patient_id);

  // Execute statement
  $stmt->execute();

  // Bind result variables
  $stmt->bind_result($patient_name, $test_date, $test_result, $test_type);

  // Fetch results
  $stmt->fetch();

  // Close statement
  $stmt->close();

  // Close connection
  $conn->close();
?>

  <h1>My COVID Test Results</h1>
  <p>Patient ID: <?php echo $patient_id; ?></p>
  <p>Patient Name: <?php echo $patient_name; ?></p>
  <p>Test Date: <?php echo $test_date; ?></p>
  <p>Test Result: <?php echo $test_result; ?></p>
  <p>Test Type: <?php echo $test_type; ?></p>
        </form>
      </div>

	  <div id="radiology" style="display:none;">
        <button onclick="hideSection()">Close</button>
        <h1>View Patient Information</h1>
		<?php
session_start();

// Check if patient is logged in
if(!isset($_SESSION["patient_id"])){
  header("Location: login.php");
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "radiology";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get radiology data for current patient
$patient_id = $_SESSION["patient_id"];
$stmt = $conn->prepare("SELECT * FROM radiology WHERE patient_id = ?");
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

// Display radiology data
echo "<section id='patient-radiology'>";
echo "<h2>Your Radiology Tests:</h2>";
while($row = $result->fetch_assoc()) {
  echo "<div class='radiology'>";
  echo "<p><strong>Radiology ID:</strong> " . $row["id"] . "</p>";
  echo "<p><strong>Test Type:</strong> " . $row["test_type"] . "</p>";
  echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
  echo "<p><strong>Notes:</strong> " . $row["notes"] . "</p>";
  echo "</div>";
}
echo "</section>";

// Close statement and connection
$stmt->close();
$conn->close();
?>

      <div id="laboratory" style="display:none;">
        <button onclick="hideSection()">Close</button>
		<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION["user_id"])){
  header("Location: login.php");
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get laboratory data for current patient
$patient_id = $_SESSION["patient_id"];
$stmt = $conn->prepare("SELECT * FROM laboratory WHERE patient_id = ?");
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

// Display laboratory data
echo "<section id='patient-laboratory'>";
echo "<h2>Your Laboratory Tests:</h2>";
while($row = $result->fetch_assoc()) {
  echo "<div class='laboratory'>";
  echo "<p><strong>Lab Test ID:</strong> " . $row["id"] . "</p>";
  echo "<p><strong>Test Type:</strong> " . $row["test_type"] . "</p>";
  echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
  echo "<p><strong>WBC:</strong> " . $row["wbc"] . "</p>";
  echo "<p><strong>RBC:</strong> " . $row["rbc"] . "</p>";
  echo "<p><strong>Hemoglobin:</strong> " . $row["hgb"] . "</p>";
  echo "<p><strong>Platelet:</strong> " . $row["plt"] . "</p>";
  echo "<p><strong>ALT:</strong> " . $row["alt_result"] . "</p>";
  echo "<p><strong>AST:</strong> " . $row["ast_result"] . "</p>";
  echo "<p><strong>ALP:</strong> " . $row["alp_result"] . "</p>";
  echo "<p><strong>TBIL:</strong> " . $row["tbil_result"] . "</p>";
  echo "<p><strong>BUN:</strong> " . $row["bun_result"] . "</p>";
  echo "<p><strong>Creatinine:</strong> " . $row["crea_result"] . "</p>";
  echo "<p><strong>Uric Acid:</strong> " . $row["ua_result"] . "</p>";
  echo "</div>";
}
echo "</section>";

// Close statement and connection
$stmt->close();
$conn->close();
?>

		</div>
      </main>
</body>
</html>