<?php
require_once "db_connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ProgresID'])) {
    // Sanitize the input
    $ProgresID = $conn->real_escape_string($_POST['ProgresID']);

    // Delete query
    $sql = "DELETE FROM progress WHERE ProgresID='$ProgresID'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: viewprogress.php");
    } else {
        echo "Error deleting record:" .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or ProgresID is not set, redirect or show an error message
    echo "Invalid request.";
}
?>

