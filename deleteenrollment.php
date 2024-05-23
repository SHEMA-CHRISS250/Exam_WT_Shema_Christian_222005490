<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['EnrollmentID'])) {
    // Sanitize the input
    $EnrollmentID = $conn->real_escape_string($_POST['EnrollmentID']);

    // Delete query
    $sql = "DELETE FROM enrollment WHERE EnrollmentID='$EnrollmentID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewenrollment.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or EnrollmentID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

