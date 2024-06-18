<?php 
require_once "importance.php"; 

if(User::loggedIn()){
	Config::redir("index.php"); 
}
?> 

<html>
<head>
	<title> <?php echo CONFIG::SYSTEM_NAME; ?> </title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='container-fluid' >
		<div class='row'>
			<div class='col-md-3'> 
				<img src='images/2 (3).jpg' class='img-responsive' /> 
			</div> <!-- this should be a sidebar --> 
			<div class='col-md-9'>
				<div class='content-area'> 
					<div class='content-header'> 
						Login <small>Login to access the system</small>
					</div>
					<div class='content-body'> 

						<?php 
							if(isset($_GET['attempt'])){
								// STARTING THE LOGIN AREA 

								$status = $_GET['attempt'];

								if($status == 1){
									$header = "Login as an Admin"; 
								} else {
									$header = "Login as a Doctor"; 
								}

								echo "<center><div class='badge-header'>$header</div></center>"; 

								// we created a method for creating forms

								if(isset($_POST['login-email'])){
									$email = $_POST['login-email']; 
									$password = $_POST['login-password'];

									if($email == "" || $password == ""){
										Messages::error("You must fill in all the fields");
									} else {
										User::login($email, $password, $status);
									}

								}

							?> 
							<div class='row'>
								<div class='col-md-3'></div>
								<div class='col-md-6'>
									<div class='form-holder'>
										<?php Db::form(array("Email", "Password"), 3, array("login-email", "login-password"), array("text", "password"), "Login"); ?> 
									</div>
								</div> 
								<div class='col-md-3'></div>
							</div> 
							<?php 
								// ENDNG TGHE LOGIN AREA
							} else {

						?>
                        
						<center><div class='badge-header'>Login As:</div></center> 
						<div class='row'>
							<div class='col-md-2'></div>
							<div class='col-md-8'> 
								<div class='row' style='margin-top: 70px;'> 
									<div class='col-md-4'>
										<center>
											<div class='img-login-icons'>
												<img  class='img-responsive' src='images/3678411 - hospital medical nurse.png' alt='login as a doctor' />
											</div>
											<center><a href='login.php?attempt=1'><div class='badge-header'>Admin</div></a></center> 

										</center> 
									</div> 
									<div class='col-md-4'> 

										<center>
											<div class='img-login-icons'>
												<img  class='img-responsive' src='images/3678412 - doctor medical care medical help stethoscope.png' alt='login as a doctor' />
											</div>
											<center><a href='login.php?attempt=2'><div class='badge-header'>Doctor</div></a></center> 
										</center>
									</div> 
									
									<div class='col-md-4'> 

										<center>
											<div class='img-login-icons'>
												<img  class='img-responsive' src='images/3678443 - ambulance fast fast hospital.png' alt='login as a doctor' />
											</div>
											<center><a href='login-patient.php'><div class='badge-header'>Patient</div></a></center> 
										</center>
									</div> 
									
								</div> 
							</div> 
							<div class='col-md-2'></div>
							<?php } ?> 

					<!-- ---------fullscreen image----- -->

						</div><!-- end of the content area --> 
					</div> 
				</div>  
			</div> 
		</div> 
	</div> 


	    <!-- Cards Section -->
		<section class="cards-section">
        <div class="card">
            <div class="icon">
                <img src="images/heart-pulse-2-svgrepo-com.png" alt="Icon 1">
            </div>
            <h3>Personalized Care</h3>
            <p>Our dedicated team provides personalized care tailored to each patient's needs.</p>
        </div>
        <div class="card">
            <div class="icon">
                <img src="images/firstaid-svgrepo-com.png" alt="Icon 2">
            </div>
            <h3>24/7 AVAILABILITY</h3>
            <p>We have a team of highly skilled specialists in women's health.</p>
        </div>
        <div class="card">
            <div class="icon">
                <img src="images/podcast-svgrepo-com.png" alt="Icon 3">
            </div>
            <h3>Advanced Technology</h3>
            <p>We utilize the latest technology to ensure the best outcomes for our patients.</p>
        </div>
    </section>

<!-- ----------about us---- -->
   <!-- About Section -->
   <div class="about_heading">
    <img src="images/section-img.png" alt="img">   <h2>We Offer Different Services To Improve Your Health</h2>
  
   </div>
   <section class="about-section" id="about">
    <div class="about-content">
   <h2>About Medi Plus</h2>
   <img src="images/section-img.png" class="img" alt="img">    
        <p>At Medi Plus, we are dedicated to providing comprehensive healthcare services tailored to meet the unique needs of women at every stage of life. Our experienced team of medical professionals is committed to delivering compassionate and personalized care.</p>
        <p>We offer a range of services from preventive care and screenings to advanced treatments and specialized care. Our goal is to support and empower women to achieve optimal health and well-being.</p>
      
    </div>
    <div class="about-image">
        <img src="images/about-us.jpg" alt="About Medi Plus">
    </div>
</section>
 <!-- -----------[book appointmemnt------] -->
 <section class="appointment-section">
    <div class="appointment-content">
     
        <h2>Book an Appointment</h2>
        <p>Our team is here to provide you with the care and support you need. Schedule an appointment with one of our specialists today.</p>
        <p>We offer a variety of services tailored to meet your unique health needs, including:</p>
   
        <a href='book_appointment.php'  class="btn" style="font-size:14px;">Book Appointment <i class='bx bx-chevrons-right'></i></a>
     
    </div>
    </div>
</section>
<!-- ---------contact form -------- -->

    <!-- Contact Section -->
 <section class="contact-section " id="contact"> 
        <div class="contact-container">
            <div class="contact-writeup">
                <h2>Contact us </h2>
                <img src="images/section-img.png" class="img" alt="img">  
                <p>please fill out the form on the right. Our team will get back to you . We are committed to providing you with the best healthcare services.</p>
                <p>Medi Plus is located at:</p>
                <address>
                    123 Health Blvd,<br>
                    Wellness City, WC 12345<br>
                    Phone: (123) 456-7890<br>
                    Email: contact@Mediplus.com
                </address>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9582186.748804923!2d-15.016348882894905!3d54.10209383324115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sng!4v1717323168085!5m2!1sen!2sng" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact-form-container">
				
			<form class="contact-form" id="contactForm" method="post" action="contact_page.php">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="message">Additional Message:</label>
        <textarea id="message" name="message" rows="4" placeholder="Any other information or questions."></textarea>

        <button type="submit" class="btn">Submit</button>
    </form>
  

        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="services-container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="service-card">
                    <img src="images/health-medical-svgrepo-com.svg" alt="Gynecology" class="service-icon">
                    <h3>Gynecology</h3>
                    <p>Comprehensive gynecological services for women of all ages, including routine exams, contraceptive counseling, and menopause management.</p>
                    <button class="btn">Learn More</button>
                </div>
                <div class="service-card">
                    <img src="images/health-insurance-svgrepo-com.svg" alt="Obstetrics" class="service-icon">
                    <h3>Obstetrics</h3>
                    <p>Expert care for pregnancy, childbirth, and postpartum, ensuring the health and well-being of both mother and baby.</p>
                    <button class="btn">Learn More</button>
                </div>
                <div class="service-card">
                    <img src="images/health-svgrepo-com.svg" alt="Breast Health" class="service-icon">
                    <h3>Breast Health</h3>
                    <p>Advanced screening, diagnosis, and treatment for breast health, including mammograms and breast cancer care.</p>
                    <button class="btn">Learn More</button>
                </div>
                <div class="service-card">
                    <img src="images/alarm-svgrepo-com.svg" alt="Fertility Services" class="service-icon">
                    <h3>Fertility Services</h3>
                    <p>Comprehensive fertility evaluations and treatments to help you on your journey to parenthood.</p>
                    <button class="btn">Learn More</button>
                </div>
                <div class="service-card">
                    <img src="images/healthcare-medical-stethoscope-svgrepo-com.svg" alt="Wellness Programs" class="service-icon">
                    <h3>Wellness Programs</h3>
                    <p>Programs designed to promote overall health and well-being, including nutrition counseling and stress management.</p>
                    <button class="btn">Learn More</button>
                </div>
                <div class="service-card">
                    <img src="images/heart-pulse-2-svgrepo-com.png" alt="Mental Health" class="service-icon">
                    <h3>Mental Health</h3>
                    <p>Comprehensive mental health services including counseling and support for women dealing with various mental health issues.</p>
                    <button class="btn">Learn More</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonials-section">
        <h2>What Our Patients Say</h2>
        <div class="testimonials-carousel">
            <div class="testimonial">
                <p>"The care I received at the Women's Health Center was outstanding. The staff was incredibly compassionate and professional."</p>
                <h4>- Jane Doe</h4>
            </div>
            <div class="testimonial">
                <p>"I felt supported and understood during my entire pregnancy journey. I can't thank the team enough for their dedication."</p>
                <h4>- Mary Smith</h4>
            </div>
            <div class="testimonial">
                <p>"The facilities are top-notch, and the attention to detail is evident in every aspect of the care provided."</p>
                <h4>- Susan Johnson</h4>
            </div>
        </div>
    </section>
    <!-- Animated Footer -->
    <footer class="footer">
        <div class="footer-content">
            <img src="images/logo.png" alt="">
            <p>Committed to providing the best healthcare services for women.</p>
            <ul class="socials">
                <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                <li><a href="#"><i class='bx bxl-whatsapp'></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> Medi Plus | Designed by Odianosen Ehimuan-Ayebeni </p>
        </div>
    </footer>

</body>
</html>
