<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $firstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO instructor (FirstName, LastName, Email, PhoneNumber) 
            VALUES ('$firstName', '$lastName', '$email', '$phoneNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
