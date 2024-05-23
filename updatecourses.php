<?php
// Database connection parameters
// Include database connection file
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $CourseID = $_POST['CourseID'];
    $CourseName = $_POST['CourseName'];
    $Description = $_POST['Description'];
    $InstructorID = $_POST['InstructorID'];

    // Update query
    $sql = "UPDATE courses SET CourseID='$CourseID', CourseName='$CourseName', Description='$Description',InstructorID='$InstructorID' WHERE CourseID='$CourseID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
         header("Location: viewcourses.php");
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
 