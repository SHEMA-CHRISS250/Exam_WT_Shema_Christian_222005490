<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $coursesName = mysqli_real_escape_string($conn, $_POST['coursesName']);
    $description = mysqli_real_escape_string($conn, $_POST['Description']);
    $instructorID = mysqli_real_escape_string($conn, $_POST['InstructorID']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO courses (CourseName, Description, InstructorID) 
            VALUES ('$coursesName', '$description', '$instructorID')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>
