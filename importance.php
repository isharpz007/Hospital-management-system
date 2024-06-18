<?php 

// This is the important file in the system, 
// it initializes all the classes and objects of the system

ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Autoload classes
spl_autoload_register(function($className) {
    require_once "classes/{$className}.class.php"; 
});

// Functions

// Get all information about the user if logged in
if (User::loggedIn()) {
    $token = $_COOKIE['emr-user'];
    
    // Use an array to store user information
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

    // Now you can use $userDetails array to get user information
}
?>
