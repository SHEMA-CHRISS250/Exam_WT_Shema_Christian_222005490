<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $ProgresID = $_POST['ProgresID'];
    $CourseID = $_POST['CourseID'];
    $CompletionStatus = $_POST['CompletionStatus'];
    $PercentageOfCourse = $_POST['PercentageOfCourse'];

    // Update query
    $sql = "UPDATE a SET CourseID='$CourseID', CompletionStatus='$CompletionStatus', PercentageOfCourse='$PercentageOfCourse' WHERE ProgresID='$ProgresID'";
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewprogress.php");
    } else {
        echo "Error updating record: " .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
 