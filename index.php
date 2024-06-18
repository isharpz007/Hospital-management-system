<?php 
require_once "importance.php"; 

if (!User::loggedIn()) {
    Config::redir("login.php");
}

// Ensure user details are fetched and available
$token = $_COOKIE['emr-user'];
$userDetails = [
    'firstName' => User::get($token, 'firstName'),
    'secondName' => User::get($token, 'secondName'),
    'email' => User::get($token, 'email'),
    'password' => User::get($token, 'password'),  // Note: Password should not be stored in plain text
    'token' => User::get($token, 'token'),
    'status' => User::get($token, 'status'),
    'phone' => User::get($token, 'phone'),
    'profile' => User::get($token, 'profile'),
    'gender' => User::get($token, 'gender'),
    'role' => User::get($token, 'role')
];

// Check user status and update role if necessary
if ($userDetails['status'] == 1) {
    $userDetails['role'] = 'Admin';
}

// Make user details available to the sidebar
include "inc/sidebar.inc.php";
?>

<html>
<head>
    <title><?php echo Config::SYSTEM_NAME; ?> | Home</title>
    <?php require_once "inc/head.inc.php"; ?> 
</head>
<body>
    <?php require_once "inc/header.inc.php"; ?> 
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-2'>
                <?php 
                // Pass user details to the sidebar
                include "inc/sidebar.inc.php"; 
                ?>
            </div>
            <div class='col-md-7'>
                <div class='content-area'> 
                    <div class='content-header'> 
                        Dashboard <small>View your dashboard</small>
                    </div>
                    <div class='content-body'>
                        <div class='row'>
                     
                            <?php if ($userDetails['status'] == 1) { Dashboard::draw("Doctors", Dashboard::doctors(), "doctors-record.php"); } ?>
                            <?php Dashboard::draw("Patients", Dashboard::patients(), "patients.php"); ?>
                            <?php Dashboard::draw("Patient Book", Dashboard::getPatientRecords(), "patients.php"); ?>
                            <?php Dashboard::draw("Appointments", Dashboard::Appointments(), "appointments.php"); ?>
                            <?php Dashboard::draw("Replied Appts.", Dashboard::repliedAppointMents(), "appointments.php"); ?>
                           
                            <?php Dashboard::draw("Change Password", "", "change-password.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <img src='images/pexels-shvetsa-4167542.jpg' class='img-responsive' />
            </div>
        </div>
    </div>
</body>
</html>
