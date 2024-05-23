<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['InstructorID'])) {
    // Sanitize the input
    $InstructorID = $conn->real_escape_string($_POST['InstructorID']);

    // Delete query
    $sql = "DELETE FROM instructor WHERE InstructorID='$InstructorID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewinstructor.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or InstructorID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

