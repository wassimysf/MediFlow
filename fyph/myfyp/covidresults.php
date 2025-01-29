
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

  </body>
</html>