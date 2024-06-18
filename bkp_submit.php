<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Use your database password
$dbname = "hospital";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $preferred_doctor = $_POST['preferred-doctor'];
    $medical_history = $_POST['medical-history'];
    $reason_for_visit = $_POST['reason-for-visit'];
    $preferred_date = $_POST['preferred-date'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bkp_appiont (name, email, phone, dob, address, department, preferred_doctor, medical_history, reason_for_visit, preferred_date, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $email, $phone, $dob, $address, $department, $preferred_doctor, $medical_history, $reason_for_visit, $preferred_date, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
            alert('Appointment successfully booked.');
            window.location.href = 'book_appointment.php'; // Redirect to the same page or any other page
        </script>";
    } else {
        echo "<script>
            alert('There was an error submitting the form. Please try again.');
            window.location.href = 'book_appointment.php'; // Redirect to the same page or any other page
        </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>