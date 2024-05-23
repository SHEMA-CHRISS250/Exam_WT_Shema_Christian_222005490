<?php
// Include the database conn file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $userID = mysqli_real_escape_string($conn, $_POST['UserID']);
    $courseID = mysqli_real_escape_string($conn, $_POST['CourseID']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO enrollment (UserID, CourseID) 
            VALUES ('$userID', '$courseID')";

    if (mysqli_query($conn, $sql)) {
        echo "Enrollment record added successfully.";
        header("Location: viewenrollment.php");
   } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close conn
    mysqli_close($conn);
}
?>