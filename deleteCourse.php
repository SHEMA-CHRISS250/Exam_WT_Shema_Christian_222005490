<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CourseID'])) {
    // Sanitize the input
    $CourseID = $conn->real_escape_string($_POST['CourseID']);

    // Delete query
    $sql = "DELETE FROM courses WHERE CourseID='$CourseID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewcourses.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or CourseID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

