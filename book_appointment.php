<?php 
require_once "importance.php"; 

if(User::loggedIn()){
	Config::redir("index.php"); 
}
?> 

<html>
<head>
	<title>Book Appointment - <?php echo CONFIG::SYSTEM_NAME; ?> </title>
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

					<!-- ---------fullscreen image----- -->
			
							<div class='col-md-2'></div>
							<?php } ?> 
						</div><!-- end of the content area --> 
					</div> 
				</div>  
			</div> 
		</div> 
	</div> 


<!-- ---------contact form -------- -->
<!-- ---------contact form -------- -->

    <!-- Contact Section -->
     <section class="contact-section " id="contact"> 
        <div class="contact-container">
            <div class="contact-writeup">
                <h2>Book an Appointment</h2>
                <img src="images/section-img.png" class="img" alt="img">  
                <p>To book an appointment, please fill out the form on the right. Our team will get back to you to confirm your appointment. We are committed to providing you with the best healthcare services.</p>
                <p>Medi Plus is located at:</p>
                <address>
                    123 Health Blvd,<br>
                    Wellness City, WC 12345<br>
                    Phone: (123) 456-7890<br>
                    Email: appointments@Mediplus.com
                </address>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9582186.748804923!2d-15.016348882894905!3d54.10209383324115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sng!4v1717323168085!5m2!1sen!2sng" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact-form-container">
                <form class="contact-form" action="bkp_submit.php" method="post">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                    <label for="department">Department:</label>
                    <select id="department" name="department" required>
                        <option value="" disabled selected>Select a department</option>
                        <option value="gynecology">Gynecology</option>
                        <option value="obstetrics">Obstetrics</option>
                        <option value="breast-health">Breast Health</option>
                        <option value="fertility-services">Fertility Services</option>
                        <option value="wellness-programs">Wellness Programs</option>
                        <option value="mental-health">Mental Health</option>
                    </select>
                   

                    <label for="preferred-doctor">Preferred Doctor:</label>
                    <input type="text" id="preferred-doctor" name="preferred-doctor">

                    <label for="medical-history">Medical History:</label>
                    <textarea id="medical-history" name="medical-history" rows="4" placeholder="Briefly describe your medical history and any current conditions." required></textarea>

                    <label for="reason-for-visit">Reason for Visit:</label>
                    <textarea id="reason-for-visit" name="reason-for-visit" rows="4" placeholder="Describe the reason for your visit." required></textarea>

                    <label for="preferred-date">Preferred Appointment Date:</label>
                    <input type="date" id="preferred-date" name="preferred-date" required>

                    <label for="message">Additional Message:</label>
                    <textarea id="message" name="message" rows="4" placeholder="Any other information or questions."></textarea>

                    <button type="submit" class="btn">Submit</button>
                </form>
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
            <p>&copy; <span id="year"></span> Medi Plus | Designed by Odianosen Ehimuan-Ayebeni</p>
        </div>
    </footer>

</body>
</html>
