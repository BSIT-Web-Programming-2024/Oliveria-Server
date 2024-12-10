<?php
// Database connection settings
$servername = "localhost";  // Database server (change if necessary)
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "contact_db";     // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    // Prepare SQL query to insert form data into the database
    $sql = "INSERT INTO messages (name, email, msg) VALUES ('$name', '$email', '$msg')";

    // Execute the query and provide feedback
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>