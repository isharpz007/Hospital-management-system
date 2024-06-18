
    <!-- Preloader Starts -->
    <!-- <div class="preloader">
        <div class="spinner"></div>
    </div>
 -->


 <nav class="navbar">
    <div class="nav_container">
        <h1 class="logo"><img src="images/logo.png" alt=""></h1>
        <ul class="nav-links">
            <li><a href="login.php">Home</a></li>
            <li><a href="#about">About Us</a></li>
           
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
                <a href="#services">users <i class='bx bx-chevron-right'></i></a>
                <div class="dropdown-content">
                
                    <a href='login-patient.php'>Patient</a>
                    <a href='login.php?attempt=2'>Doctor </a>
                    <a href='login.php?attempt=1'> Admin</a>
                </div>
            </li>
           
            <a  class="button" href='addpat.php'> <li>Book Appointment</li></a>

             
        <!-- <li><a href="#" class="right" >Link</a></li> -->
                <?php if(!User::loggedIn() && !Patient::isPatientIn() ) {?> 
               <li><a href='login.php' class="right">Login</a></li>
               <?php } else {
                ?> 

               <!-- <li><a href='profile.php?token=<?php //echo $token; ?> '>Hello <?php// echo $userFirstName." ".$userSecondName; ?>,</a></li>--> 
			    <li><a href='logout.php'>Logout</a></li>
                <?php 
               } ?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </div>
</nav> 
