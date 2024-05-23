<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $EnrollmentID = $_POST['EnrollmentID'];
    $UserID = $_POST['UserID'];
    $CourseID = $_POST['CourseID'];

    // Update query
    $sql = "UPDATE enrollment SET UserID='$UserID', CourseID='$CourseID' WHERE EnrollmentID='$EnrollmentID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewenrollment.php");
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
 