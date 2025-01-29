<!DOCTYPE html>
<html>
<head>
	<title>Hospital Website</title>
	<link rel="stylesheet" type="text/css" href="index.css">
    <script src="index.js"></script>
    <style>
  
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.6;
  }

header {
	background-color: #003366;
	color: #fff;
	padding: 30px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

header h1{
	background-color: #003366;
	color: #fff;
	display: flex;
    margin-left: 8px;
	justify-content: space-between;
	align-items: center;
}

nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
	display: flex;
}

nav li {
margin: 0 10px;
}

nav a {
color: #fff;
text-decoration: none;
}

    </style>
</head>
<body>
    <header>
      
      <div class="container">
        <h1 class="logo">Hospital Name</h1>
        <nav>
          <ul>
            <li><a href="#laboratory" onclick="smoothScroll(event)">Laboratory</a></li>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
  
    <section id="hero">
      <h2 id="hero-title">Quality Health Care Services</h2>
      <p id="hero-subtitle">We provide quality healthcare services to our patients.</p>
      <a href="#services" class="btn">View Services</a>
    </section>

    <section id="services">
      <h2>Our Services</h2>
      <div class="container">
  
        <div class="service-item">
          <img src="img/s2.jpg" alt="Service 1">
          <h3>Emergency Care</h3>
          <p>We provide 24/7 emergency care services with our expert medical team.</p>
        </div>
        <div class="service-item">
          <img src="img/s3.jpg" alt="Service 2">
          <h3>Specialist Clinics</h3>
          <p>We have a range of specialist clinics to cater to your specific medical needs.</p>
        </div>
        <div class="service-item">
          <img src="img/s1.jpg" alt="Service 3">
          <h3>Diagnostic Imaging</h3>
          <p>Our state-of-the-art diagnostic imaging equipment provides accurate and timely results.</p>
        </div>
      </div>
    </section>

    <section id="laboratory">
  <div class="container">
    <h2>Laboratory</h2>
    <div class="row">
      <div class="col-md-6">
        <h3>Blood Tests</h3>
        <p>Our laboratory offers a range of blood tests to help diagnose and monitor medical conditions. Our experienced technicians use state-of-the-art equipment to provide accurate and reliable results.</p>
      </div>
      <div class="col-md-6">
        <img src="img/laboratory.jpg" alt="Laboratory image 1">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <img src="img/covid.jpg" alt="Laboratory image 2">
      </div>
      <div class="col-md-6">
        <h3>Covid19 Test</h3>
        <p>Our Covid19 testing service is designed to keep you safe. We offer a quick, easy, and accurate testing process. If you have symptoms or have been exposed, our experienced medical professionals can provide you with the testing you need to help prevent the spread of the virus.</p>
      </div>
    </div>
  </div>
</section>

    <section id="radiology">
        <div class="container">
          <h2>Radiology</h2>
          <div class="row">
            <div class="col-md-6">
              <img src="img/xray.jpg" alt="Radiology image 1">
            </div>
            <div class="col-md-6">
              <h3>X-Ray</h3>
              <p>X-ray is a type of medical imaging that uses electromagnetic radiation to create images of the inside of the body. It is commonly used to detect bone fractures, lung infections, and other medical conditions.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h3>CTscam</h3>
              <p>MRI, or magnetic resonance imaging, is a non-invasive medical imaging technique that uses a magnetic field and radio waves to create detailed images of the inside of the body. It is particularly useful for visualizing soft tissues such as organs, muscles, and nerves.</p>
            </div>
            <div class="col-md-6">
              <img src="img/ctscan.jpg" alt="Radiology image 2">
            </div>
            <div class="row">
              <div class="col-md-6">
                <img src="img/mri.jpg" alt="Radiology image 1">
              </div>
              <div class="col-md-6">
                <h3>MRI</h3>
                <p>CT scan, or computed tomography, is a medical imaging technique that uses X-rays and computer processing to create detailed cross-sectional images of the body. It can be used to detect and diagnose a wide range of medical conditions, including tumors, internal injuries, and blood clots.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

       
    <div class="login-container">
      <h2>Login</h2>
      <form method="post" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
    </div>

    <section id="doctors">
      <h2>Our Physician</h2>
      <div class="doctor">
        <div class="doctor-item">
          <img src="img/phy1.jpg" alt="Service 1">
          <h3>Dr. John Smith</h3>
          <p>Specialization: Cardiology</p>
        </div>
        <div class="doctor-item">
          <img src="img/phy2.jpg" alt="Service 2">
          <h3>Dr. Jane Doe</h3>
          <p>Specialization: Pediatrics</p>
        </div>
        <div class="doctor-item">
          <img src="img/phy3.jpg" alt="Service 2">
          <h3>Dr. Jane Doe</h3>
          <p>Specialization: Pediatrics</p>
        </div>
        <div class="doctor-item">
          <img src="img/phy4.jpg" alt="Service 2">
          <h3>Dr. Jane Doe</h3>
          <p>Specialization: Pediatrics</p>
        </div>
        <div class="doctor-item">
          <img src="img/phy5.jpg" alt="Service 2">
          <h3>Dr. Jane Doe</h3>
          <p>Specialization: Pediatrics</p>
        </div>
    </section>

    <section id="about">
      <h2>About Us</h2>
      <div class="container">
        <div class="about-item">
          <img src="img/about1.jpg" alt="About Image 1">
          <p>We are a team of medical professionals dedicated to providing high-quality healthcare services to our patients. Our mission is to improve the health and well-being of our community by providing compassionate and personalized care.</p>
        </div>
        <div class="about-item">
          <img src="img/about2.jpg" alt="About Image 2">
          <p>Our state-of-the-art facilities and advanced medical technologies enable us to deliver accurate and timely diagnoses, as well as effective treatments. We believe that every patient deserves to receive the best possible care, and we are committed to making that a reality.</p>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <h2>Contact Us</h2>
        <form>
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" placeholder="Your Message" required></textarea>
          <button type="submit">Send</button>
        </form>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="row">
			  <div class="col-md-6">
				<ul class="contact-info">
				  <li><i class="fa fa-phone"></i> Phone: +1 555-555-5555</li>
				  <li><i class="fa fa-envelope"></i> Email: info@hospital.com</li>
				</ul>
			  </div>
			</div>
    </section>
    
  
    <script src="script.js"></script>
  </body>
  </html>