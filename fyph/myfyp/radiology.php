<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Radiology Page</title>
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
h2 {
        color: #33683399;
        font-size: 20px;
        margin: 0;
        padding: 20px 0;
        text-align: center;
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
            input[type="file"] {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                width: 100%;
                box-sizing: border-box;
                margin-bottom: 20px;
            }
            input[type="text"]{
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
            }
            textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
            height: 150px;
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
            display: block;
            margin: 0 auto;
            }
            input[type="submit"]:hover {
                background-color: #23527c;
            }
            table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #0072c6;
  color: #fff;
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
        <section id="radiology">
            <h1>Radiology Page</h1>
            <form action="radiologyadd.php" method="POST" enctype="multipart/form-data">
                <label for="patient-id">Patient ID:</label>
                <input type="text" id="patient-id" name="patient-id" required>
                
                <label for="test-select">Select a Radiology Test:</label>
                <select id="test-select" name="test-select">
                  <option value="X-Ray">X-Ray</option>
                  <option value="CT Scan">CT Scan</option>
                  <option value="MRI">MRI</option>
                </select>
                
                <label for="image-upload">Upload Images:</label>
                <input type="file" id="image-upload" name="image-upload" accept="image/*" multiple>
                
                <label for="report-upload">Upload Report:</label>
                <input type="file" id="report-upload" name="report-upload" accept=".pdf,.doc,.docx">
                
                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" rows="4"></textarea>
                
                <input type="submit" name="submit" value="Submit">
              </form>
        </section>
        <h1>Covid tests</h1>
        <?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hsis";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch radiology records from the database
$sql = "SELECT * FROM radiology";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
// Display the records in a table format
echo "<table>";
echo "<tr><th>Test_id</th><th>Patient ID</th><th>Test</th><th>Images</th><th>Report</th><th>Notes</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['radiology_id'] . "</td>";
    echo "<td>" . $row['patient_id'] . "</td>";
    echo "<td>" . $row['test_type'] . "</td>";
    echo "<td><img src='" . $row['image_data'] . "' width='150'></td>";
    echo "<td><a href='" . $row['report_data'] . "' target='_blank'>View Report</a></td>";
    echo "<td>" . $row['notes'] . "</td>";
    echo "</tr>";
}

echo "</table>";
} else {
  echo "<h2>No results found<h2>";
}


// Close the database connection
mysqli_close($conn);
?>
        <section id="radiology">
            <h1>Radiology Delete</h1>
            <form action="radiologydelete.php" method="POST">
              <label for="id">Test ID:</label>
              <input type="text" id="rad-id" name="rad-id" required>
              <input type="submit" name="delete" value="Delete">
            </form>
          </section>
         
    </body>
    </html>
    
  </body>
</html>