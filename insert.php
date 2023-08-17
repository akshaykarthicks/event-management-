<?php
// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websitelogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $eventtype = mysqli_real_escape_string($conn, $_POST['eventtype']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO bookdel1 (name, email, phone, eventtype, date, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisis", $name, $email, $phone, $eventtype, $date, $message);

    if ($stmt->execute() === TRUE) {
        header('Location: http://127.0.0.1:5501/index3.html');
        exit;    
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
