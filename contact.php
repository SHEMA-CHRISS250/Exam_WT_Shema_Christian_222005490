<?php
require_once "db_connection.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $message = $conn->real_escape_string($_POST['Message']);
    
    // SQL insert statement
    $sql = "INSERT INTO Contact (Name, Email, Message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQL connection
$conn->close();
?>
