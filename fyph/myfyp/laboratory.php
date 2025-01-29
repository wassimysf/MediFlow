<?php
session_start();

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
  $disabled = false;
  $hidden = false;
  // Get patient ID from session
  $patient_id = $_SESSION["patient_id"]??'';
  
  if(isset($_GET['userType'])){
    $disabled = 'disabled';
    $hidden = 'hidden';
  }
  $query = "SELECT * FROM laboratory WHERE patient_id = '$patient_id'";

// Execute the query
$result = $conn->query($query);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
   $row = $result->fetch_assoc();
  $laboratory_id = $row['laboratory_id'];
  $patient_id  = $row['patient_id'];
  $name = $row['name'];
  $age = $row['age'];
  $gender = $row['gender'];
  $wbc = $row['wbc'];
  $rbc = $row['rbc'];
  $hgb = $row['hgb'];
  $plt = $row['plt'];
  $alt_result = $row['alt_result'];
  $ast_result = $row['ast_result'];
  $alp_result = $row['alp_result'];
  $tbil_result = $row['tbil_result'];
  $bun_result = $row['bun_result'];
  $crea_result = $row['crea_result'];
  $ua_result = $row['ua_result'];
 
    
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blood Test Results</title>
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
      form {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 70px;
        margin: 0 auto;
        max-width: 1000px;
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
      input[type="text"],
      input[type="number"] {
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
      h2 {
        font-size: 24px;
        margin-top: 40px;
        margin-bottom: 20px;
        color: #336699;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 16px;
      }
      th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      th {
        background-color: #336699;
        color: #fff;
      }
      td {
        background-color: #f2f2f2;
      }
      button[type="submit"] {
     background-color: #336699;
     color: #fff;
     border: none;
     padding: 10px 20px;
     margin: 20px auto 0;
     border-radius: 4px;
     font-size: 18px;
     cursor: pointer;
     transition: background-color 0.3s ease-in-out;
     display: inline-block;
     }

    button[type="submit"]:hover {
      background-color: #23527c;
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
    <?php
      // SQL query to select all data from the table
$sql = "SELECT * FROM laboratory";

// Execute the query
$result = mysqli_query($conn, $sql);

    ?>
    <div <?php echo $hidden; if($hidden == "hidden"){echo " style=\"display:none;\"";}?>>
    <table >
      <?php
        // Create an HTML table to display the data
echo "<table>";
echo "<tr><th>Laboratory ID</th><th>Patient ID</th><th>Name</th><th>Age</th><th>Gender</th><th>WBC</th><th>RBC</th><th>HGB</th><th>PLT</th><th>ALT Result</th><th>AST Result</th><th>ALP Result</th><th>TBIL Result</th><th>BUN Result</th><th>Crea Result</th><th>UA Result</th></tr>";

// Loop through the data and display it in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["laboratory_id"] . "</td>";
    echo "<td>" . $row["patient_id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["age"] . "</td>";
    echo "<td>" . $row["gender"] . "</td>";
    echo "<td>" . $row["wbc"] . "</td>";
    echo "<td>" . $row["rbc"] . "</td>";
    echo "<td>" . $row["hgb"] . "</td>";
    echo "<td>" . $row["plt"] . "</td>";
    echo "<td>" . $row["alt_result"] . "</td>";
    echo "<td>" . $row["ast_result"] . "</td>";
    echo "<td>" . $row["alp_result"] . "</td>";
    echo "<td>" . $row["tbil_result"] . "</td>";
    echo "<td>" . $row["bun_result"] . "</td>";
    echo "<td>" . $row["crea_result"] . "</td>";
    echo "<td>" . $row["ua_result"] . "</td>";
    echo "</tr>";
}
echo "</table>";

      ?>
    </table>
    </div>
    <h1>Blood Test Results</h1>
    
      <form action="laboratoryadd.php" method="POST">
        <label for="patient-id">Patient ID:</label>
        <input type="text" id="patient-id" name="patient_id" required <?php echo $disabled;?> value="<?php echo $patient_id;?>">
        
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" <?php echo $disabled;?> value="<?php echo $name??'';?>"><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" <?php echo $disabled;?> value="<?php echo $age??'';?>"><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" <?php echo $disabled;?> >
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        
        <h2>Complete Blood Count (CBC)</h2>
        
        <table>
          <tr>
            <th>Test</th>
            <th>Result</th>
            <th>Normal Range</th>
          </tr>
          <tr>
            <td>White Blood Cells (WBC)</td>
            <td><input type="number" id="wbc" name="wbc" min="3.5" max="10" step="0.01" required <?php echo $disabled;?> value="<?php echo $wbc??'';?>"></td>
            <td>3.5 - 10 x10^9/L</td>
          </tr>
          <tr>
            <td>Red Blood Cells (RBC)</td>
            <td><input type="number" id="rbc" name="rbc" min="4.5" max="5.5" step="0.01" required  <?php echo $disabled;?> value="<?php echo $rbc??'';?>"></td>
            <td>4.5 - 5.5 x10^12/L</td>
          </tr>
          <tr>
            <td>Hemoglobin (HGB)</td>
            <td><input type="number" id="hgb" name="hgb" min="13" max="17" step="0.01" required  <?php echo $disabled;?> value="<?php echo $hgb??'';?>"></td>
            <td>13 - 17 g/dL</td>
          </tr>
          <tr>
            <td>Platelets (PLT)</td>
            <td><input type="number" id="plt" name="plt" min="150" max="450" step="0.01" required  <?php echo $disabled;?> value="<?php echo $plt??'';?>"></td>
            <td>150 - 450 x10^9/L</td>
          </tr>
        </table>
        <h2>Liver Function Tests (LFTs)</h2>
        <table>
          <tr>
            <th>Test</th>
            <th>Result</th>
            <th>Normal Range</th>
          </tr>
          <tr>
            <td>Alanine Aminotransferase (ALT)</td>
            <td><input type="number" id="alt-result" name="alt_result" step="0.1" min="0" max="55" required  <?php echo $disabled;?> value="<?php echo $alt_result??'';?>"></td>
            <td>0-55 U/L</td>
          </tr>
          <tr>
            <td>Aspartate Aminotransferase (AST)</td>
            <td><input type="number" id="ast-result" name="ast_result" step="0.1" min="0" max="40" required  <?php echo $disabled;?> value="<?php echo $ast_result??'';?>"></td>
            <td>0-40 U/L</td>
          </tr>
          <tr>
            <td>Alkaline Phosphatase (ALP)</td>
            <td><input type="number" id="alp-result" name="alp_result" step="0.1" min="45" max="115" required  <?php echo $disabled;?> value="<?php echo $alp_result??'';?>"></td>
            <td>45-115 U/L</td>
          </tr>
          <tr>
            <td>Total Bilirubin (TBIL)</td>
            <td><input type="number" id="tbil-result" name="tbil_result" step="0.1" min="0.1" max="1.2" required  <?php echo $disabled;?> value="<?php echo $tbil_result??'';?>"></td>
            <td>0.1-1.2 mg/dL</td>
        </tr>
      </table>
      <h2>Kidney Function Tests</h2>
      <table>
            <tr>
              <th>Test</th>
              <th>Result</th>
              <th>Normal Range</th>
            </tr>
            <tr>
              <td>Blood Urea Nitrogen (BUN)</td>
              <td><input type="number" id="bun-result" name="bun_result" step="0.01" required <?php echo $disabled;?> value="<?php echo $bun_result??'';?>"></td>
              <td>7 - 22 mg/dL</td>
            </tr>
            <tr>
              <td>Creatinine (CREA)</td>
              <td><input type="number" id="crea-result" name="crea_result" step="0.01" required <?php echo $disabled;?> value="<?php echo $crea_result??'';?>"></td>
              <td>0.6 - 1.3 mg/dL</td>
            </tr>
            <tr>
              <td>Uric Acid (UA)</td>
              <td><input type="number" id="ua-result" name="ua_result" step="0.01" required <?php echo $disabled;?> value="<?php echo $ua_result??'';?>"></td>
              <td>2.6 - 6 mg/dL</td>
            </tr>
          </table>
          <button type="submit" <?php echo $hidden; if($hidden == "hidden"){echo " style=\"display:none;\"";}?>>Submit</button>
    </form>
    <section id="radiology" <?php echo $hidden; if($hidden == "hidden"){echo " style=\"display:none;\"";}?>>
            <h1>Laboratory Delete</h1>
            <form action="radiologydelete.php" method="POST">
              <label for="id">Test ID:</label>
              <input type="text" id="rad-id" name="rad-id" required>
              <input type="submit" name="delete" value="Delete">
            </form>
          </section>
  </body>
</html>