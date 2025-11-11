<?php
// Database connection
$host = "localhost"; // Change if needed
$username = "root";  // Change if needed
$password = "";      // Change if needed
$database = "contactsInfo"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $subject = $conn->real_escape_string($_POST["subject"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data (Without datetime)
    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "success"; // Response for JavaScript
    } else {
        echo "Database Error: " . $conn->error;
    }
}

$conn->close();
?>
