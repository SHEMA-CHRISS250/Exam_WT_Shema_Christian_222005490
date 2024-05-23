<?php
// Include the database connection file
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $courseID = mysqli_real_escape_string($conn, $_POST['CourseID']);
    $completionStatus = mysqli_real_escape_string($conn, $_POST['CompletionStatus']);
    $percentageOfCourse = mysqli_real_escape_string($conn, $_POST['PercentageOfCourse']);

    // Attempt to insert the data into the database
    $sql = "INSERT INTO progress (CourseID, CompletionStatus, PercentageOfCourse) 
            VALUES ('$courseID', '$completionStatus', '$percentageOfCourse')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>

