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

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
            alert(' Successfully Sent');
            window.location.href = 'login.php'; // Redirect to the same page or any other page
        </script>";
    } else {
        echo "<script>
            alert('There was an error submitting the form. Please try again.');
            window.location.href = 'login.php'; // Redirect to the same page or any other page
        </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

